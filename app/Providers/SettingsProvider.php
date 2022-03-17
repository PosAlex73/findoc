<?php

namespace App\Providers;

use App\Models\Setting;
use App\Settings\Set;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class SettingsProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        App::bind(Set::class, function ($app) {
            return new Set(Setting::all());
        });
    }
}
