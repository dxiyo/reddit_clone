<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Upvotes extends Component
{
    public $upvotes;
    public function render()
    {
        return view('livewire.upvotes');
    }
}
