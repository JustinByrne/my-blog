<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;

class Slug extends Component
{
    public $name;
    public $slug;
    public $title;
    
    public function mount($model = null, $title = false)
    {
        if (! is_null($model) && ! $title) {
            $this->name = $model->name;
            $this->slug = $model->slug;
        } elseif (! is_null($model) && $title) {
            $this->name = $model->title;
            $this->slug = $model->slug;
        }
        $this->title = $title;
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
