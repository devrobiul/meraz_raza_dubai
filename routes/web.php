<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\SinglePageController;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->group(function(){
    Route::get('/','home')->name('home');
    Route::get('/about-me','about')->name('about-me');
    Route::get('/services','services')->name('services');
    Route::get('/portfolio', 'portfolio')->name('portfolio');
    Route::get('/blog', 'blog')->name('blog');
    Route::get('/gallery', 'gallery')->name('gallery');
    Route::get('/contact-me', 'contactMe')->name('contact-me');
});
Route::controller(SinglePageController::class)->group(function(){
    Route::get('details/{type}/{slug}','singlepost')->name('single.post');

});


Route::controller(ContactController::class)->group(function(){
    Route::post('message/store', 'messageStore')->name('contact.store');

});


// Admin login route
Route::controller(LoginController::class)->middleware('guest')->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'loginStore')->name('login.store');
});

