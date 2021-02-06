<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subreddit;
use Illuminate\Support\Facades\Auth;

class SubscribeSubredditController extends Controller
{
    public function store(Subreddit $subreddit) {
        $user = $user = Auth::user();
        $user->subscribe($subreddit);

        return back();
        // return $subreddit->name;
    }
}
