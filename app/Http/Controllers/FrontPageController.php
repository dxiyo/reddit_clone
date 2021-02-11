<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Subreddit;
use Illuminate\Support\Facades\Auth;

class FrontPageController extends Controller
{
    public function index() {

        if(Auth::check()) {
            // user is logged in
            $posts = auth()->user()->subscribed->map->allPosts()->sortByDesc('created_at')->flatten();
        } else {
            $posts = $posts = Subreddit::all()->map->allPosts()->sortByDesc('upvotes')->flatten();
        }
        
        return view('home', [
            'posts' => $posts,
            'subreddits' => Subreddit::take(4)->get(),
        ]);
    }
}
