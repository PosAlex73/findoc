<?php

use App\Http\Controllers\Front\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('front.index');
Route::get('/service', [IndexController::class, 'services'])->name('front.services');
Route::get('/doctors', [IndexController::class, 'doctors'])->name('front.doctors');
Route::get('/clinics', [IndexController::class, 'clinics'])->name('front.clinics');
Route::get('/promotions', [IndexController::class, 'promotions'])->name('front.promotions');
Route::get('/reviews', [IndexController::class, 'reviews'])->name('front.reviews');
Route::get('/contacts', [IndexController::class, 'contacts'])->name('front.contacts');
