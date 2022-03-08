<?php

namespace App\Providers;

use App\BreadCrumbs\BreadCrumbs;
use App\Composers\AdminComposers\BreadCrumbsComposer;
use App\Composers\AdminComposers\SidebarComposer;
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
        View::composer('admin.*', BreadCrumbsComposer::class);
    }
}
