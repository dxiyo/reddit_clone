<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Showmore extends Component
{
    public $visible = false;
    public $display = 'none';
    public $arrow = 'down';
    public $rule;

    public function toggleRule(){
        if($this->visible) {
            $this->visible = false;
            $this->display = 'none';
            $this->arrow = 'down';
        } else {
            $this->visible = true;
            $this->display = 'block';
            $this->arrow = 'up';
        }
    }

    public function render()
    {
        return view('livewire.showmore');
    }
}
