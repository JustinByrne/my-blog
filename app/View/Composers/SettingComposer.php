<?php

namespace App\View\Composers;

use App\Models\Setting;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class SettingComposer
{
    public $settings;

    public function __construct()
    {
        $this->settings = [
            'site_name',
            'tag_line',
            'site_logo',
            'facebook_url',
            'instagram_url',
            'github_url',
            'twitter_url',
        ];
    }
    
    public function compose(View $view)
    {
        try {
            DB::connection()->getPdo();
        } catch (\Exception $e) {
            foreach ($this->settings as $setting) {
                $view->with($setting, null);
            }

            return;
        }
        
        foreach ($this->settings as $setting) {
            $view->with($setting, Setting::where('name', $setting)->first()->value);
        }
    }
}