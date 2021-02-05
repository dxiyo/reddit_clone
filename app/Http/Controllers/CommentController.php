<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\ImagePost;
use App\Models\Subreddit;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Subreddit $subreddit, $postId, $type)
    {
        switch($type){
            case "text":
                $post = Post::where('id', $postId)->first();
                break;
            case "image":
                $post = ImagePost::where('id', $postId)->first();
                break;
        }
        $validation = $request->validate([
            'comment' => 'required'
        ]);

        Comment::create([
            'user_id' => auth()->user()->id,
            'commentable_id' => $post->id,
            'commentable_type' => get_class($post),
            'body' => $request->comment
        ]);

        return back();
    }
    
    public function storeReply(Request $request, Comment $comment)
    {
        $validation = $request->validate([
            'comment' => 'required'
        ]);

        Comment::create([
            'user_id' => auth()->user()->id,
            'commentable_id' => $comment->id,
            'commentable_type' => 'App\Models\Comment',
            'body' => $request->comment
        ]);

        return back();
    }
}
