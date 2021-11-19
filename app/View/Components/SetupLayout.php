<?php

namespace App\View\Components;

use Illuminate\View\View;
use Illuminate\View\Component;

class SetupLayout extends Component
{
    public $title;
    
    public function __construct($title = null)
    {
        $this->title = $title;
    }
    
    public function render(): View
    {
        return view('layouts.setup');
    }
}
