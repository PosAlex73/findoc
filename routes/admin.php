<?php

use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ClinicController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SpecController;
use App\Http\Controllers\Admin\SpecReviewController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserHistoryController;
use App\Http\Controllers\Admin\VacancyController;
use Illuminate\Support\Facades\Route;

//Route::prefix('/admin')->middleware(['auth', 'is_admin'])->group(function () {
Route::prefix('/boss')->group(function () {
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
    Route::resource('services', \App\Http\Controllers\Admin\ServiceController::class);

    //threads
    Route::get('/threads', [\App\Http\Controllers\Admin\ThreadController::class, 'index'])->name('threads.index');
    Route::get('/documents', [\App\Http\Controllers\Admin\DocumentController::class, 'index'])->name('documents.index');

    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');
});
