<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Subreddit;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Subreddit $subreddit, Post $post)
    {
        $validation = $request->validate([
            'comment' => 'required'
        ]);

        Comment::create([
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
            'body' => $request->comment
        ]);

        return back();
    }
}
