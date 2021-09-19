<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Images extends Component
{
    public $media;
    public $selectedImage;
    public $alt_text;

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
        $this->alt_text = $this->selectedImage->alt_text;
    }

    public function closeImage()
    {
        $this->selectedImage = null;
        $this->alt_text = null;
    }

    public function updateImage()
    {
        $this->selectedImage->update([
            'alt_text' => $this->alt_text,
        ]);

        $this->closeImage();
    }
}
