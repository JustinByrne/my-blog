<?php

namespace App\View\Components;

use Illuminate\View\View;
use Illuminate\View\Component;

class PublicLayout extends Component
{
    public $image;
    public $subtitle;
    
    public function __construct($image = null)
    {
        $this->image = ! is_null($image) && $image != '' ? $image : null ;
    }
    
    public function render(): View
    {
        return view('layouts.public');
    }
}
