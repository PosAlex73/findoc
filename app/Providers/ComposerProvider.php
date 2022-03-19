<?php

namespace App\Providers;

use App\BreadCrumbs\BreadCrumbs;
use App\Composers\Admin\AdminComposer;
use App\Composers\Admin\ArticleComposer;
use App\Composers\Admin\CategoryComposer;
use App\Composers\Admin\PromoComposer;
use App\Composers\Admin\SimpleUserComposer;
use App\Composers\Admin\SpecStatusesComposer;
use App\Composers\Admin\UserComposer;
use App\Composers\Admin\VacancyComposer;
use App\Composers\Common\DoctorComposer;
use App\Enums\Vacancies\VacancyStatuses;
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
        View::composer(
            [
                'admin.views.blog.create',
                'admin.views.blog.edit',
                'admin.views.vacancies.create',
                'admin.views.vacancies.edit',
                'admin.views.doctors.create',
                'admin.views.doctors.edit',
            ], CategoryComposer::class);

        View::composer(['admin.views.promotions.create', 'admin.views.promotions.edit'], PromoComposer::class);
        View::composer(['admin.views.vacancies.create', 'admin.views.vacancies.edit'], VacancyComposer::class);

        View::composer(['admin.views.doctors.create', 'admin.views.doctors.edit'], SpecStatusesComposer::class);
    }
}
