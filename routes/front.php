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
Route::get('/promotions/{promotion}', [\App\Http\Controllers\Front\PromotionController::class, 'view'])->name('front.promotions.view');

Route::prefix('/profile')->middleware(['auth'])->group(function () {
    Route::get('/', [\App\Http\Controllers\Front\UserProfileController::class, 'profile'])->name('front.profile');
    Route::get('/history', [\App\Http\Controllers\Front\UserHistoryController::class, 'history'])->name('front.history.list');

    Route::get('/notifications', [\App\Http\Controllers\Front\UserProfileController::class, 'notifications'])->name('front.notifications');
    Route::delete('/notifications/{notification}', [\App\Http\Controllers\Front\UserProfileController::class, 'delete_notification'])->name('front.notifications.delete');

    Route::get('/records', [\App\Http\Controllers\Front\AppointmentController::class, 'records'])->name('front.records');
    Route::get('/records/{record}', [\App\Http\Controllers\Front\AppointmentController::class, 'record'])->name('front.records.view');

    Route::get('/thread', [\App\Http\Controllers\Front\ThreadController::class, 'thread'])->name('front.thread');
    Route::post('/thread/{user}', [\App\Http\Controllers\Front\ThreadController::class, 'newMessage'])->name('front.thread.new_message');

    Route::get('/documents', [\App\Http\Controllers\Front\UserDocumentController::class, 'documents'])->name('front.documents');
    Route::post('/documents', [\App\Http\Controllers\Front\UserDocumentController::class, 'saveDocument'])->name('front.save_document');
    Route::delete('/documents/{document}', [\App\Http\Controllers\Front\UserDocumentController::class, 'deleteDocument'])->name('front.delete_document');
});

