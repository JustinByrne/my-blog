<?php

namespace App\View\Components;

use App\Models\Setting;
use Illuminate\View\Component;

class SeoTags extends Component
{
    public $title;
    public $model;
    public $type;
    public $image;
    public $time;
    public $twitter;
    
    public function __construct($title = null, $model = null, $image = null)
    {
        $this->title = $title;
        $this->model = $model;
        $this->type = $this->getType();
        $this->image = $image;

        if ($this->type == "article") {
            $this->time = $this->getTime();
            $this->twitter = $this->getTwitter();
        }
    }

    public function render()
    {
        return view('components.seo-tags');
    }

    public function getType()
    {
        if (is_null($this->model)) return 'website';

        $class = get_class($this->model);

        if (strpos($class, 'Article') !== false) return 'article';

        return 'website';
    }

    public function getTime()
    {
        $minutes = ceil(str_word_count($this->model->content) / 200);
        $denomination = $minutes > 1 ? ' minutes' : ' minute';

        return $minutes . $denomination;
    }

    public function getTwitter()
    {
        $url = Setting::where('name', 'twitter_url')->first()->value;
        $sections = explode('/', $url);

        return '@' . end($sections);
    }
}
