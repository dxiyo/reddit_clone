<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SubredditList extends Component
{
    public $subreddits;
    public $subreddit;
    public $list = 'hidden';
    public $hidden = true;

    public function toggleList() {
        if($this->hidden) {
            $this->hidden = false;
            $this->list = 'block';
        } else {
            $this->hidden = true;
            $this->list = 'hidden';
        }
    }

    public function render()
    {
        return view('livewire.subreddit-list');
    }
}
