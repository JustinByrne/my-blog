<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;

class Article extends Component
{
    public $title;
    public $slug;

    public function mount($article = null)
    {
        if (! is_null($article)) {
            $this->title = $article->title;
            $this->slug = $article->slug;
        }
    }
    
    public function render()
    {
        return view('livewire.article');
    }

    public function updatedTitle()
    {
        if ($this->title != '') {
            $this->slug = Str::slug($this->title);
        } else {
            $this->slug = '';
        }
    }
}
