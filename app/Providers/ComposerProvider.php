<?php

namespace App\Providers;

use App\BreadCrumbs\BreadCrumbs;
use App\Composers\Admin\AdminComposer;
use App\Composers\Admin\ArticleComposer;
use App\Composers\Admin\CategoryComposer;
use App\Composers\Admin\SimpleUserComposer;
use App\Composers\Admin\UserComposer;
use App\Composers\Common\DoctorComposer;
use App\Models\Category;
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
            'admin.views.records.create',
            'admin.views.records.edit'
            ],
            SimpleUserComposer::class);

        View::composer(
            [
                'admin.views.records.create',
                'admin.views.records.edit'
            ],
            DoctorComposer::class);

        View::composer('admin.views.blog.*', ArticleComposer::class);
        View::composer(['admin.views.blog.create', 'admin.views.blog.edit'], CategoryComposer::class);
    }
}
