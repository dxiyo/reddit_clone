<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subreddit;

class PopularController extends Controller
{
    public function index() {
        $posts = Subreddit::all()->map->allPosts()->sortByDesc('upvotes')->flatten();
        return view('home', [
            'posts' => $posts,
            'subreddits' => Subreddit::take(4)->get(),
        ]);
    }
}
