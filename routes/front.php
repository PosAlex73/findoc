<?php

use App\Http\Controllers\Front\CategoryController;
use App\Http\Controllers\Front\AppointmentController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\ClinicController;
use App\Http\Controllers\Front\IndexController;
use App\Http\Controllers\Front\PromotionController;
use App\Http\Controllers\Front\ServiceController;
use App\Http\Controllers\Front\SpecController;
use App\Http\Controllers\Front\ThreadController;
use App\Http\Controllers\Front\UserDocumentController;
use App\Http\Controllers\Front\UserHistoryController;
use App\Http\Controllers\Front\UserProfileController;
use Illuminate\Support\Facades\Route;

//main menu
Route::get('/', [IndexController::class, 'index'])->name('front.index');
Route::get('/service', [IndexController::class, 'services'])->name('front.services');
Route::get('/doctors', [IndexController::class, 'doctors'])->name('front.doctors');
Route::get('/clinics', [IndexController::class, 'clinics'])->name('front.clinics');
Route::get('/promotions', [IndexController::class, 'promotions'])->name('front.promotions');
Route::get('/blog', [BlogController::class, 'articles'])->name('front.blog');

Route::get('/categories/{category}', [CategoryController::class, 'view'])->name('front.categories.view');
Route::get('/services/{service}', [ServiceController::class, 'details'])->name('front.services.details');
Route::get('/doctors/{spec}', [SpecController::class, 'view'])->name('front.doctors.view');
Route::get('/clinics/{clinic}', [ClinicController::class, 'view'])->name('front.clinics.view');


Route::get('/record/', [AppointmentController::class, 'record'])->name('front.record');
Route::post('/record', [AppointmentController::class, 'createRecord'])->name('front.new_record');
Route::get('/blog/{blog}', [BlogController::class, 'view'])->name('front.blog.article');
Route::get('/promotions/{promotion}', [PromotionController::class, 'view'])->name('front.promotions.view');

Route::prefix('/profile')->middleware(['auth'])->group(function () {
    Route::get('/', [UserProfileController::class, 'profile'])->name('front.profile');
    Route::get('/history', [UserHistoryController::class, 'history'])->name('front.history.list');

    Route::get('/notifications', [UserProfileController::class, 'notifications'])->name('front.notifications');
    Route::delete('/notifications/{notification}', [UserProfileController::class, 'deleteNotification'])->name('front.notifications.delete');

    Route::get('/records', [AppointmentController::class, 'records'])->name('front.records');
    Route::get('/records/{record}', [AppointmentController::class, 'record'])->name('front.records.view');

    Route::get('/thread', [ThreadController::class, 'thread'])->name('front.thread');
    Route::post('/thread/{user}', [ThreadController::class, 'newMessage'])->name('front.thread.new_message');

    Route::get('/documents', [UserDocumentController::class, 'documents'])->name('front.documents');
    Route::post('/documents', [UserDocumentController::class, 'storeDocument'])->name('front.save_document');
    Route::delete('/documents/{document}', [UserDocumentController::class, 'deleteDocument'])->name('front.delete_document');
});

