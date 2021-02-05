<?php

namespace App\Http\Controllers;

use App\Models\ImagePost;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

class UpvoteController extends Controller
{
    public function upvote(User $user, $postId, $type) {
        switch($type){
            case "text":
                $post = Post::where('id', $postId)->first();
                break;
            case "image":
                $post = ImagePost::where('id', $postId)->first();
                break;
        }
        $post->upvote($user);
        return back();
    }
    
    public function downvote(User $user, $postId, $type) {
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
    
    public function upvoteComment(User $user, Comment $comment) {
        $comment->upvote($user);
        return back();
    }
    
    public function downvoteComment(User $user, Comment $comment) {
        $comment->downvote($user);
        return back();
    }
}
