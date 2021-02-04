<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Comment extends Component
{
    public $comment;
    public $reply = 'hidden';
    public $hidden = true;

    public function toggleReply() {
        if($this->hidden) {
            $this->hidden = false;
            $this->reply = 'block';
        } else {
            $this->hidden = true;
            $this->reply = 'hidden';
        }
    }
    public function render()
    {
        return view('livewire.comment');
    }
}
