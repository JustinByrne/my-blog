<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppLayout extends Component
{
    public $ckeditor;

    public function __construct($ckeditor = false)
    {
        $this->ckeditor = $ckeditor;
    }
    
    public function render()
    {
        return view('layouts.app');
    }
}
