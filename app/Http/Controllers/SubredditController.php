<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Subreddit;
use Illuminate\Support\Facades\Auth;

class SubredditController extends Controller
{
    public function index($subreddit) {
        
        return view('subreddits.index', [
            'subreddit' => Subreddit::where('name', $subreddit)->first()
        ]);
    }
    
    public function create() {
        return view('subreddits.create');
    }

    public function store(Subreddit $subreddit) {
        $user = $user = Auth::user();
        $user->subscribe($subreddit);

        return back();
        // return $subreddit->name;
    }
    
}
