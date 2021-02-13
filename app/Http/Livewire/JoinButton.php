<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class JoinButton extends Component
{
    public $subreddit;
    public $is_subscribed;

    public function mount() {
        if(Auth::check()) {
            $this->is_subscribed = auth()->user()->is_subscribed($this->subreddit);
        } else {
            $this->is_subscribed = false;
        }
    }

    public function subscribe() {
        if(Auth::check()) {
            $user = auth()->user();
            $user->subscribe($this->subreddit);
    
            $this->is_subscribed = auth()->user()->is_subscribed($this->subreddit);
        } else {
            redirect('/login');
        }
    }
    public function render()
    {
        return view('livewire.join-button');
    }
}
