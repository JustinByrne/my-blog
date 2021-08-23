<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Imageupload extends Component
{
    public $article;
    
    public function mount($article = null)
    {
        if (! is_null($article)) {
            $this->article = $article;
        }
    }
    
    public function render()
    {
        return view('livewire.imageupload');
    }
}
