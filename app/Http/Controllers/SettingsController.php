<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Setting;
use App\Models\TempFile;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\SocialRequest;
use App\Http\Requests\SettingRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function general(): View
    {
        $settings = Setting::all();
        
        return view('settings.general', compact('settings'));
    }

    public function storeSettings(SettingRequest $request): RedirectResponse
    {
        Setting::where('name', 'site_name')->first()->update(['value' => $request->site_name]);
        Setting::where('name', 'tag_line')->first()->update(['value' => $request->tag_line]);

        $file = TempFile::where('folder', $request->image)->first();
        if ($file) {
            $media = Image::find(1);
            $image = $media->addMedia(Storage::path($request->image . '/' . $file->filename))->toMediaCollection();
            Setting::where('name', 'site_logo')->first()->update(['value' => $image->getUrl()]);
            $file->delete();
        }

        return redirect()->route('settings.general');
    }

    public function social(): View
    {
        $settings = Setting::all();
        
        return view('settings.social', compact('settings'));
    }

    public function storeSocial(SocialRequest $request): RedirectResponse
    {
        Setting::where('name', 'facebook_url')->first()->update(['value' => $request->facebook_url]);
        Setting::where('name', 'instagram_url')->first()->update(['value' => $request->instagram_url]);
        Setting::where('name', 'twitter_url')->first()->update(['value' => $request->twitter_url]);
        Setting::where('name', 'github_url')->first()->update(['value' => $request->github_url]);

        return redirect()->route('settings.social');
    }
}
