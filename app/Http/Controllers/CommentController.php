<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate(['body' => 'required|string|max:1000']);

        $post->comments()->create([
            'user_id' => auth()->id(),
            'body' => $request->body,
        ]);

        return back()->with('success', 'Comment posted!');
    }

    public function destroy(Comment $comment)
    {
        abort_unless($comment->user_id === auth()->id(), 403);
        $comment->delete();
        return back()->with('success', 'Comment deleted!');
    }
}