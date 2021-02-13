<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class CommentUpvotes extends Component
{
    public $upvotes;
    public $comment;

    // upvotes the comment and also rerenders the upvotes
    public function upvote() {
        $this->comment->upvote(auth()->user());
        $this->upvotes = Comment::withUpvotes()->find($this->comment->id)->upvotes;
    }

    // downvotes the comment and also rerenders the upvotes
    public function downvote() {
        $this->comment->downvote(auth()->user());
        $this->upvotes = Comment::withUpvotes()->find($this->comment->id)->upvotes;
    }

    public function render()
    {
        return view('livewire.comment-upvotes');
    }
}
