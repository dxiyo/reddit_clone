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
    public $textForm = 'block';
    public $textFormButton = 'text-blue-600 border-b-2 border-blue-600
    text-blue-600 border-b-2 border-blue-600';
    public $imageForm = 'hidden';
    public $imageFormButton = '';

    public function mount() {
        $this->subreddit = Subreddit::all();
        
    }

    public function showTextForm() {
        $this->textForm = 'block';
        $this->textFormButton = 'text-blue-600 border-b-2 border-blue-600
        text-blue-600 border-b-2 border-blue-600';
        $this->imageForm = 'hidden';
        $this->imageFormButton = '';
    }

    public function showImageForm() {
        $this->textForm = 'hidden';
        $this->textFormButton = '';
        $this->imageForm = 'block';
        $this->imageFormButton = 'text-blue-600 border-b-2 border-blue-600
        text-blue-600 border-b-2 border-blue-600';
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
