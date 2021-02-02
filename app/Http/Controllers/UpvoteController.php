<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

class UpvoteController extends Controller
{
    public function upvote(User $user, Post $post) {
        $post->upvote($user);
        return back();
    }
    
    public function downvote(User $user, Post $post) {
        $post->downvote($user);
        return back();
    }
    
    public function upvoteComment(User $user, Comment $comment) {
        $comment->upvote($user);
        return back();
    }
    
    public function downvoteComment(User $user, Comment $comment) {
        $comment->downvote($user);
        return back();
    }
}
