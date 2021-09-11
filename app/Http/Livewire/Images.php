<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Images extends Component
{
    public $media;
    public $selectedImage;

    public function mount()
    {
        $this->selectedImage = null;
    }
    
    public function render()
    {
        return view('livewire.images');
    }

    public function viewImage($image)
    {
        $this->selectedImage = $image;
    }

    public function closeImage()
    {
        $this->selectedImage = null;
    }
}
