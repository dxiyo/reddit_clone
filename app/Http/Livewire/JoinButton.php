<?php

namespace App\Http\Livewire;

use Livewire\Component;

class JoinButton extends Component
{
    public $subreddit;
    public function render()
    {
        return view('livewire.join-button');
    }
}
