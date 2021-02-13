<?php

namespace App\Http\Livewire;

use App\Models\Subreddit;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class SubredditList extends Component
{
    public $subreddits;
    public $subName;
    public $sub;
    public $list = 'hidden';
    public $hidden = true;

    public function mount() {
        if(Request::is('/') || Request::is('user/*')) {
            $this->subName = "Home"; // show the homepage link if the user is in the home or in his profile page
        } elseif (Request::is('popular')) {
            $this->subName = "Popular";
        } elseif(Request::is('r/*')) {
            $link = request()->url(); // gets the link
            $link_array = explode('/r/',$link); // split the link into an array by the /r/ portion of the link
            $endOfLink = end($link_array); // gets the end of the array. example: /r/subreddit, /r/subreddit/submit
            if (str_contains($endOfLink, '/')) { // if the slug after /r/ isnt just the name of a subreddit
                $endOfLinkArr = explode('/', $endOfLink); // example: subName/submit becomes ['subName', 'submit']
                $this->subName = $endOfLinkArr[0]; // gets the subName from the array
            } else {
                $this->subName = $endOfLink; // if it's just the subreddit name just take it.
            }
            
            $this->sub = Subreddit::whereName($this->subName)->first();
        }
    }



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
