<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ImagePost extends Component
{
    public $upvotes;
    public $post;
    public $comment;
    public function render()
    {
        return view('livewire.image-post');
    }
}
