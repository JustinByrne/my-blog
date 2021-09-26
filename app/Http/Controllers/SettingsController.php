<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function general(): View
    {
        return view('settings.general');
    }
}
