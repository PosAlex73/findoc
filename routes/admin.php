<?php

use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ClinicController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\DownloadController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SpecController;
use App\Http\Controllers\Admin\SpecReviewController;
use App\Http\Controllers\Admin\ThreadController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserHistoryController;
use App\Http\Controllers\Admin\VacancyController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::get('/boss/login', [AuthenticatedSessionController::class, 'adminLogin'])->name('admin.login');

Route::prefix('/boss')->middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::resource('users', UserController::class);
    Route::resource('records', AppointmentController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('clinics', ClinicController::class);
    Route::resource('specs', SpecController::class);
    Route::resource('histories', UserHistoryController::class);
    Route::resource('spec_reviews', SpecReviewController::class);
    Route::resource('promotions', PromotionController::class);
    Route::resource('vacancies', VacancyController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('documents', DocumentController::class);


    Route::post('/users/mass', [UserController::class, 'massDelete'])->name('users.mass_delete');
    Route::post('/records/mass', [AppointmentController::class, 'massDelete'])->name('records.mass_delete');
    Route::post('/blogs/mass', [BlogController::class, 'massDelete'])->name('blogs.mass_delete');
    Route::post('/categories/mass', [CategoryController::class, 'massDelete'])->name('categories.mass_delete');
    Route::post('/clinics/mass', [ClinicController::class, 'massDelete'])->name('clinics.mass_delete');
    Route::post('/specs/mass', [SpecController::class, 'massDelete'])->name('specs.mass_delete');
    Route::post('/histories/mass', [UserHistoryController::class, 'massDelete'])->name('histories.mass_delete');
    Route::post('/spec_reviews/mass', [SpecReviewController::class, 'massDelete'])->name('spec_reviews.mass_delete');
    Route::post('/promotions/mass', [PromotionController::class, 'massDelete'])->name('promotions.mass_delete');
    Route::post('/vacancies/mass', [VacancyController::class, 'massDelete'])->name('vacancies.mass_delete');
    Route::post('/services/mass', [ServiceController::class, 'massDelete'])->name('services.mass_delete');
    Route::post('/documents/mass', [DocumentController::class, 'massDelete'])->name('documents.mass_delete');

    //threads
    Route::get('/threads', [ThreadController::class, 'index'])->name('threads.index');

    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');

    Route::get('/download/{path}/{file}', [DownloadController::class, 'download'])->name('download');
});
