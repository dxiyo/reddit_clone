<?php

namespace App\Http\Livewire;

use Livewire\Component;

class JoinButton extends Component
{
    public $subreddit;
    public $is_subscribed;

    public function mount() {
        $this->is_subscribed = auth()->user()->is_subscribed($this->subreddit);
    }

    public function subscribe() {
        $user = auth()->user();
        $user->subscribe($this->subreddit);

        $this->is_subscribed = auth()->user()->is_subscribed($this->subreddit);
    }
    public function render()
    {
        return view('livewire.join-button');
    }
}
