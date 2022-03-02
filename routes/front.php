<?php

use App\Http\Controllers\Front\IndexController;
use Illuminate\Support\Facades\Route;

//main menu
Route::get('/', [IndexController::class, 'index'])->name('front.index');
Route::get('/service', [IndexController::class, 'services'])->name('front.services');
Route::get('/doctors', [IndexController::class, 'doctors'])->name('front.doctors');
Route::get('/clinics', [IndexController::class, 'clinics'])->name('front.clinics');
Route::get('/promotions', [IndexController::class, 'promotions'])->name('front.promotions');
Route::get('/reviews', [IndexController::class, 'reviews'])->name('front.reviews');
Route::get('/contacts', [IndexController::class, 'contacts'])->name('front.contacts');
Route::get('/blog', [\App\Http\Controllers\Front\BlogController::class, 'articles'])->name('front.blog');

Route::get('/doctors/{spec}', [\App\Http\Controllers\Front\SpecController::class, 'view'])->name('front.doctors.view');
Route::get('/clinics/{clinic}', [\App\Http\Controllers\Front\ClinicController::class, 'view'])->name('front.clinics.view');
Route::get('/appointment/', [\App\Http\Controllers\Front\AppointmentController::class, 'record'])->name('front.record');
Route::get('/blog/{blog}', [\App\Http\Controllers\Front\BlogController::class, 'view'])->name('front.blog.article');

Route::prefix('/profile')->middleware(['auth'])->group(function () {
    Route::get('');
});

