<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index($subreddit, $postTitle) {
        $post = Post::where(['title'=> $postTitle, 'subreddit_name' => $subreddit])->first();
        return view('post', [
            'post' => $post
        ]);
    }
}
