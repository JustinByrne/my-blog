<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Images extends Component
{
    public $media;
    
    public function render()
    {
        return view('livewire.images');
    }
}
