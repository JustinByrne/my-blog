<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\SettingRequest;
use Illuminate\Http\RedirectResponse;

class SettingsController extends Controller
{
    public function general(): View
    {
        $settings = Setting::all();
        
        return view('settings.general', compact('settings'));
    }

    public function storeSettings(SettingRequest $request)
    {
        Setting::where('name', 'site_name')->first()->update(['value' => $request->site_name]);
        Setting::where('name', 'tag_line')->first()->update(['value' => $request->tag_line]);

        return redirect()->route('settings.general');
    }
}
