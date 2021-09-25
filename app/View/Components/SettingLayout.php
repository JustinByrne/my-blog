<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class SettingLayout extends Component
{
    public function __construct()
    {
        //
    }

    public function render(): View
    {
        return view('layouts.setting');
    }
}
