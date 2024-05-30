<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\Authentication;
use Faker\Guesser\Name;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware'=> 'guest'], function () {
    Route::get('/test', [Home::class, 'test']);
    Route::get('/login', [Authentication::class, 'index'] );
    Route::get('/signup', [Authentication::class, 'signup'] )->name('auth.signup');
    Route::post('/registration', [Authentication::class, 'registration'] )->name('auth.registration');
    Route::post('/authentication', [Authentication::class, 'authentication'])->name('auth.authentication');
});

Route::group(['middleware'=> 'auth'], function () {
    Route::get('/home', [Home::class, 'index'])->name('home');
    Route::get('/logout', [Authentication::class, 'logout'] )->name('logout');

});




