<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subreddit;
use App\Models\ImagePost;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ImagePostController extends Controller
{
    public function store(Subreddit $subreddit, Request $request) {
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
        return redirect('/r/' . $subreddit->name . '/comments/' . $post->title . '/' . 'App%5CModels%5CImagePost/'  . $post->id);

    }
}
