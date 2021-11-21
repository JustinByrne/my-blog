<?php

namespace App\View\Components;

use Illuminate\View\View;
use Illuminate\View\Component;

class PublicLayout extends Component
{
    public $image;
    public $subtitle;
    public $model;
    
    public function __construct($image = null, $model = null)
    {
        $this->image = $image != '' ? $image : null;
        $this->model = $model;
    }
    
    public function render(): View
    {
        return view('layouts.public');
    }
}
