<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class Upvotes extends Component
{
    public $upvotes;
    public $post;
    public $type;

    // upvotes the post and also rerenders the upvotes
    public function upvote() {
        $this->post->upvote(auth()->user());

        $this->upvotes = Post::withUpvotes()->find($this->post->id)->upvotes;
    }

    // downvotes the post and also rerenders the upvotes
    public function downvote() {
        $this->post->downvote(auth()->user());

        $this->upvotes = Post::withUpvotes()->find($this->post->id)->upvotes;
    }
    public function render()
    {
        return view('livewire.upvotes');
    }
}
