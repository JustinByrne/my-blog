<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

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

    public function viewImage($id)
    {
        $this->selectedImage = Media::find($id);
    }

    public function closeImage()
    {
        $this->selectedImage = null;
    }
}
