<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\ExpenseController;
use App\Http\Controllers\Admin\FaqsController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\IncomeController;
use App\Http\Controllers\Admin\VehicleController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\PurchaseController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\SaleController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});



Route::controller(AttributeController::class)->prefix('attribute')->name('attribute.')->group(function () {
    Route::get('/{type}', 'index')->name('index');
    Route::get('/{type}/create', 'create')->name('create');
    Route::post('/{type}', 'store')->name('store');
    Route::get('/{type}/edit/{id}', 'edit')->name('edit');
    Route::put('/{type}/{id}', 'update')->name('update');
    Route::delete('/{type}/{id}', 'destroy')->name('destroy');
});



Route::controller(SettingController::class)->group(function () {
    Route::get('/general/index', 'general')->name('setting.general');
    Route::get('/information/index', 'information')->name('setting.information');
    Route::get('/google/code/index', 'googleCode')->name('setting.googlecode');
    Route::get('/seo/{type}/index', 'seo')->name('setting.seo');
    Route::post('/setting/store', 'store')->name('setting.store');
});

Route::controller(ProfileController::class)->prefix('profile')->group(function () {
    Route::get('/index', 'index')->name('profile');
    Route::post('/profile/update', 'profileUpdate')->name('profile.update');
    Route::post('/password/update', 'passwordUpdate')->name('password.update');
});



Route::controller(PostController::class)->name('post.')->group(function () {
    Route::get('post/{type}', 'index')->name('index');
    Route::get('post/create/{type}', 'create')->name('create');
    Route::post('post/store/{type}', 'store')->name('store');
    Route::get('post/edit/{id}', 'edit')->name('edit');
    Route::put('post/update/{id}', 'update')->name('update');
    Route::delete('post/destroy/{id}', 'destroy')->name('destroy');
});

Route::controller(PageController::class)->group(function () {
    Route::get('page/index/{slug}', 'index')->name('page');
    Route::put('/page/{id}', 'update')->name('page.update');
});




Route::controller(SectionController::class)->prefix('section')->name('section.')->group(function () {
    Route::get('/{type}', 'index')->name('index');
});

Route::resource('education', EducationController::class)->names('education');
Route::resource('gallery', GalleryController::class)->names('gallery');
