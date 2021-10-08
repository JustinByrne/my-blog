<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('site_name', Setting::where('name', 'site_name')->first()->value);
        View::share('tag_line', Setting::where('name', 'tag_line')->first()->value);
        View::share('facebook_url', Setting::where('name', 'facebook_url')->first()->value);
        View::share('instagram_url', Setting::where('name', 'instagram_url')->first()->value);
        View::share('github_url', Setting::where('name', 'github_url')->first()->value);
        View::share('twitter_url', Setting::where('name', 'twitter_url')->first()->value);
    }
}
