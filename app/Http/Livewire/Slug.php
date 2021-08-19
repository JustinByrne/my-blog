<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;

class Slug extends Component
{
    public $name;
    public $slug;
    
    public function mount($model = null)
    {
        if (! is_null($model)) {
            $this->name = $model->name;
            $this->slug = $model->slug;
        }
    }
    
    public function render()
    {
        return view('livewire.slug');
    }

    public function updatedName()
    {
        if ($this->name != '') {
            $this->slug = Str::slug($this->name);
        } else {
            $this->slug = '';
        }
    }
}
