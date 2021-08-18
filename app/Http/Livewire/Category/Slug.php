<?php

namespace App\Http\Livewire\Category;

use Livewire\Component;
use Illuminate\Support\Str;

class Slug extends Component
{
    public $name;
    public $slug;
    
    public function render()
    {
        return view('livewire.category.slug');
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
