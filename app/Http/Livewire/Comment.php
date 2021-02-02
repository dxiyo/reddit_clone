<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Comment extends Component
{
    public $comments;
    // public $upvotes;
    public function render()
    {
        return view('livewire.comment');
    }
}
