<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CommentUpvotes extends Component
{
    public $upvotes;
    public $comment;

    // upvotes the comment and also rerenders the upvotes
    public function upvote() {
        if(Auth::check()) {
            $this->comment->upvote(auth()->user());
            $this->upvotes = Comment::withUpvotes()->find($this->comment->id)->upvotes;
        } else {
            redirect('/login');
        }
    }

    // downvotes the comment and also rerenders the upvotes
    public function downvote() {
        if(Auth::check()) {
            $this->comment->downvote(auth()->user());
            $this->upvotes = Comment::withUpvotes()->find($this->comment->id)->upvotes;
        } else {
            redirect('/login');
        }
    }

    public function render()
    {
        return view('livewire.comment-upvotes');
    }
}
