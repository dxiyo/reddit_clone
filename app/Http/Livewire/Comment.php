<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Comment extends Component
{
    public $comments;
    public $more = 'hidden';
    public $hidden = true;

    public function toggleMore() {
        if($this->hidden) {
            !$this->hidden;
            $this->more = 'inline';
        } else {
            !$this->hidden;
            $this->more = 'hidden';
        }
    }
    public function render()
    {
        return view('livewire.comment');
    }
}
