<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class DownvoteController extends Controller
{
    public function store(User $user, $postId, $type) {
        switch($type){
            case "text":
                $post = Post::where('id', $postId)->first();
                break;
            case "image":
                $post = ImagePost::where('id', $postId)->first();
                break;
        }
        $post->downvote($user);
        return back();
    }
}
