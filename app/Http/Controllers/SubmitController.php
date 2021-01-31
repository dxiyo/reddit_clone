<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subreddit;


class SubmitController extends Controller
{
    public function __invoke()
    {
        return view('create', [
            'subreddits' => auth()->user()->subscribed
        ]);
    }
}