<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Tag as Tags;
use Illuminate\Support\Str;

class Tag extends Component
{
    public $query;
    public $tags;
    public $selected;

    public function mount($model = null)
    {
        $this->query = null;
        $this->selected = array();

        if (! is_null($model)) {
            foreach ($model->tags as $tag) {
                $this->selected[$tag->id] = $tag->name;
            }
        }
    }
    
    public function render()
    {
        return view('livewire.tag');
    }

    public function updatedQuery()
    {
        if ($this->query != '') {
            $this->tags = Tags::where('name', 'like', '%' . $this->query . '%')
                ->whereNotIn('id', array_keys($this->selected))
                ->orderByRaw('LOCATE(\'' . $this->query . '\', name)')
                ->take(4)
                ->get()
                ->toArray();
        } else {
            $this->query = null;
        }
    }

    public function add($id, $name)
    {
        $this->selected[$id] = $name;
        $this->query = null;
    }

    public function remove($id)
    {
        unset($this->selected[$id]);
    }

    public function create($name)
    {
        $tag = Tags::create([
            'name' => $name,
            'slug' => Str::slug($name),
        ]);

        $this->selected[$tag->id] = $name;
        $this->query = null;
    }
}
