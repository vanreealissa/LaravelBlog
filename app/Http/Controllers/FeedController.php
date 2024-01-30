<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Spatie\Feed\Feed;
use Spatie\Feed\FeedItem;
use App\Models\Blog;

class FeedController extends Controller

{
    public function index()
    {
        $feed = Feed::create()
            ->title('Jouw Blogtitel')
            ->description('De beschrijving van jouw blog')
            ->id(url('/'))
            ->link(url('/'))
            ->author('Jouw Naam'); // Make sure the `author` method exists in your Spatie\Feed\Feed class

        $blogs = Blog::latest()->limit(10)->get();

        foreach ($blogs as $blog) {
            $feed->add(FeedItem::create()
                ->id(url("/blogs/{$blog->id}"))
                ->title($blog->title)
                ->summary($blog->description)
                ->updated($blog->created_at)
                ->link(url("/blogs/{$blog->id}"))
                ->author($blog->user->name)); // Make sure the `author` method exists in your Spatie\Feed\FeedItem class
        }

        return $feed->toResponse();
    }
}
