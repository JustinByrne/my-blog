<?php

namespace App\View\Components;

use Illuminate\View\View;
use Illuminate\View\Component;

class PublicLayout extends Component
{
    public $image;
    
    public function __construct($image = null)
    {
        $this->image = ! is_null($image) && $image != '' ? $image : 'https://images.pexels.com/photos/956999/milky-way-starry-sky-night-sky-star-956999.jpeg' ;
    }
    
    public function render(): View
    {
        return view('layouts.public');
    }
}
