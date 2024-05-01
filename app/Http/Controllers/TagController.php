<?php

namespace App\Http\Controllers;

use view;
use App\Models\Tag;
use App\Models\Blog;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function create()
    {
        $tags = Tag::all();
        return view('blogs.create', compact('tags'));
    }
    
    public function edit(Blog $blog)
    {
        $tags = Tag::all();
        return view('blogs.edit', compact('blog', 'tags'));
    }
}
