<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Subreddit;
class FrontPageController extends Controller
{
    public function index() {
    $posts = Subreddit::all()->map->allPosts()->sortByDesc('created_at')->flatten();
    return view('home', [
        'posts' => $posts,
        'subreddits' => Subreddit::take(4)->get()
    ]);
    }
}
