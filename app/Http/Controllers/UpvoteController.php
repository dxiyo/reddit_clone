<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

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
}
