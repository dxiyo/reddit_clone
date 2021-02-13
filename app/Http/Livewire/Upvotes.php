<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Upvotes extends Component
{
    public $upvotes;
    public $post;
    public $type;

    // upvotes the post and also rerenders the upvotes
    public function upvote() {
        if(Auth::check()) {
            $this->post->upvote(auth()->user());
    
            $this->upvotes = Post::withUpvotes()->find($this->post->id)->upvotes;
        } else {
            redirect('/login');
        }
    }

    // downvotes the post and also rerenders the upvotes
    public function downvote() {
        if(Auth::check()) {
            $this->post->downvote(auth()->user());
    
            $this->upvotes = Post::withUpvotes()->find($this->post->id)->upvotes;
        } else {
            redirect('/login');
        }
    }
    public function render()
    {
        return view('livewire.upvotes');
    }
}
