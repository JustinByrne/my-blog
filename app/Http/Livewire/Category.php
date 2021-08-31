<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category as Categories;

class Category extends Component
{
    public $category;
    public $categories;
    
    public function mount($article = null)
    {
        if (! is_null($article)) {
            $this->public = $article->category;
        }
    }
    
    public function render()
    {
        $this->categories = Categories::all();
        
        return view('livewire.category');
    }
}
