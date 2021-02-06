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

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
        ]);

        $sub = Subreddit::create([
                'name' => $request->name,
                'user_id' => auth()->user()->id,
                'description' => $request->description,
                'type' => $request->type
            ]);

        

        return redirect("/r/{$sub->name}");
    }
    
}
