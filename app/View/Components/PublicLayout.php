<?php

namespace App\View\Components;

use Illuminate\View\View;
use Illuminate\View\Component;

class PublicLayout extends Component
{
    public $image;
    
    public function __construct($image = null)
    {
        $this->image = ! is_null($image) && $image != '' ? $image : 'https://source.unsplash.com/collection/4510513/1024x768' ;
    }
    
    public function render(): View
    {
        return view('layouts.public');
    }
}
