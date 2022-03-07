<?php

use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ClinicController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SpecController;
use App\Http\Controllers\Admin\SpecReviewController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserHistoryController;
use Illuminate\Support\Facades\Route;

//Route::prefix('/admin')->middleware(['auth', 'is_admin'])->group(function () {
Route::prefix('/admin')->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('records', AppointmentController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('clinics', ClinicController::class);
    Route::resource('specs', SpecController::class);
    Route::resource('histories', UserHistoryController::class);
    Route::resource('spec_reviews', SpecReviewController::class);

    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');

    Route::get('/', [\App\Http\Controllers\Admin\Dashboard::class, 'dashboard'])->name('dashboard');
});
