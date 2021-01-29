<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Subreddit;

class CreatePost extends Component
{
    public $subreddits;
    public $listeners = ['pickSubreddit' => 'chooseSubreddit'];
    public $sub = '';
    public $counter = 1;
    public $currentSub;

    public function mount() {
        $this->subreddit = Subreddit::all();
        
    }
    // public function chooseSubreddit() {
    //     $sub = '';
    // }
    public function updated() {
        return redirect()->to('/r/' . $this->sub . '/submit');

    }

    public function render()
    {
        return view('livewire.create-post');
                          
    }
}
