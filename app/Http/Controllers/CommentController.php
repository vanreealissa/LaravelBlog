<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $blogId)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $comment = new Comment([
            'content' => $request->input('content'),
            'user_id' => auth()->id(),
            'blog_id' => $blogId,
        ]);

        $comment->save();

        return redirect()->back()->with('Success', 'Comment posted successfully.');
    }

    public function destroy($commentId)
    {
        $comment = Comment::findOrFail($commentId);

        if (Auth::id() === $comment->user_id) {
            $comment->delete();
            return redirect()->back()->with('Success', 'Reactie succesvol verwijderd.');
        } else {
            return redirect()->back()->with('Error', 'Je hebt geen toestemming om deze reactie te verwijderen.');
        }
    }
}

