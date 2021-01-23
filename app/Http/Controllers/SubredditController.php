<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Subreddit;

class SubredditController extends Controller
{
    public function index($subreddit) {
        
        return view('subreddit', [
            'subreddit' => Subreddit::where('name', $subreddit)->first()
        ]);
    }
    
}
