<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CommentUpvotes extends Component
{
    public $upvotes;
    public $comment;
    public function render()
    {
        return view('livewire.comment-upvotes');
    }
}
