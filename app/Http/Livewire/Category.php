<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Category as Categories;

class Category extends Component
{
    public $category;
    public $categories;
    public $selectedCategory;
    public $newCategory;

    protected $rules = [
        'newCategory' => [
            'required',
            'unique:App\Models\Category,name'
        ],
    ];
    
    public function mount($article = null)
    {
        $this->selectedCategory = 1;
        
        if (! is_null($article)) {
            $this->selectedCategory = $article->category->id;
        }
    }
    
    public function render()
    {
        $this->categories = Categories::all();
        
        return view('livewire.category');
    }

    public function changeCategory($id) {
        $this->selectedCategory = $id;
    }

    public function addCategory()
    {
        $this->validate();

        $slug = Str::slug($this->newCategory);

        Categories::create([
            'name' => $this->newCategory,
            'slug' => $slug,
        ]);

        $this->newCategory = null;
    }
}
