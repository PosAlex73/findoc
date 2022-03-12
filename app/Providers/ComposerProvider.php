<?php

namespace App\Providers;

use App\BreadCrumbs\BreadCrumbs;
use App\Composers\Admin\AdminComposer;
use App\Composers\Admin\UserComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerProvider extends ServiceProvider
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
        View::composer('admin.*', AdminComposer::class);
        View::composer('admin.views.users.*', UserComposer::class);
    }
}
