<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\ImagePost;
use App\Models\Subreddit;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index($subreddit, $postTitle, Request $request, $type, $id) {

        switch($request->type) {
            case "App\Models\Post":
                $post = Post::withUpvotes()->where(['title'=> $postTitle, 'subreddit_name' => $subreddit, 'id' => $id])->first();
                break;
            case "App\Models\ImagePost":
                $post = ImagePost::withUpvotes()->where(['title'=> $postTitle, 'subreddit_name' => $subreddit, 'id' => $id])->first();
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

    public function storeText(Subreddit $subreddit, Request $request) {
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
        
        return redirect()->to('/r/' . $subreddit->name . '/comments/' . $post->title . '/' . 'App\Models\Post');
    }

    public function storeImage(Subreddit $subreddit, Request $request) {
        $validator = $request->validate([
            'title' => 'required|max:300',
            'path' => 'required'
        ]);
        
        
        
        $extension = $request->path->extension();
        
        $url = Storage::url('/image_posts/' . $validator['title'] . '.' . $extension);
        
        $request->path->storeAs(
            'image_posts', $validator['title'] . '.' . $extension
        );
        
        $post = ImagePost::create([
            'user_id' => auth()->user()->id,
            'subreddit_name' => $subreddit->name,
            'title' => $request->title,
            'path' => $url
        ]);
        Session::flash('success', 'Success!');
        return redirect('/r/' . $subreddit->name . '/comments/' . $post->title . '/' . 'App\Models\ImagePost');

    }
}
