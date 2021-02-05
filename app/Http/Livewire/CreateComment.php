<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreateComment extends Component
{
    public $post;
    public $type;
    public function render()
    {
        return view('livewire.create-comment');
    }
}
