<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\ImagePost;
use App\Models\Subreddit;

class PostController extends Controller
{
    public function index($subreddit, $postTitle, Request $request) {

        switch($request->type) {
            case "App\Models\Post":
                $post = Post::withUpvotes()->where(['title'=> $postTitle, 'subreddit_name' => $subreddit])->first();
                break;
            case "App\Models\ImagePost":
                $post = ImagePost::withUpvotes()->where(['title'=> $postTitle, 'subreddit_name' => $subreddit])->first();
                break;
        }

        return view('post', [
            'post' => $post,
            'subreddit' => $post->subreddit,
            'upvotes' => $post->upvotes ?: 0

        ]);
    }

    public function create($subreddit) {
        return view('create-sub', [
            'subreddits' => auth()->user()->subscribed,
            'subreddit' => Subreddit::where('name', $subreddit)->first()
        ]);
    }

    public function store(Subreddit $subreddit, Request $request) {
        $validator = $request->validate([
            'title' => 'required|max:300',
            'body' => 'nullable'
        ]);
        
        $post = Post::create([
            'user_id' => auth()->user()->id,
            'subreddit_name' => $subreddit->name,
            'title' => $request->title,
            'body' => $request->body
        ]);
        
        return redirect()->to('/r/' . $subreddit->name . '/comments/' . $post->title);
    }
}
