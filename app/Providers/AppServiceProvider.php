<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use App\View\Composers\SettingComposer;
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
        View::composer('*', SettingComposer::class);
    }
}
