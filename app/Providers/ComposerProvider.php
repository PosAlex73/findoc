<?php

namespace App\Providers;

use App\BreadCrumbs\BreadCrumbs;
use App\Composers\Admin\AdminComposer;
use App\Composers\Admin\SimpleUserComposer;
use App\Composers\Admin\UserComposer;
use App\Composers\Common\DoctorComposer;
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

        //user cruds
        View::composer([
            'admin.views.user_histories.create',
            'admin.views.documents.create',
            'admin.views.records.create'
            ],
            SimpleUserComposer::class);

        View::composer(
            [
                'admin.views.records.create',
                'admin.views.records.edit'
            ],
            DoctorComposer::class);
    }
}
