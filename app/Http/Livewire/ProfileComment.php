<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProfileComment extends Component
{
    public $comment;

    public function render()
    {
        return view('livewire.profile-comment');
    }
}
