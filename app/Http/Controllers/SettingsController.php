<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\View\View;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function general(): View
    {
        $settings = Setting::all();
        
        return view('settings.general', compact('settings'));
    }
}
