<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/login', function () {
    return view('auth.login');
})->name('auth.login');
Route::get('/signup', function () {
    return view('auth.signup');
})->name('auth.signup');
Route::get('/addToken', function () {
    return view('auth.addToken');
})->name('auth.addToken');
Route::get('/forgotPassword', function () {
    return view('auth.forgotPassword');
})->name('auth.forgotPassword');
Route::get('/resetPassword', function () {
    return view('auth.resetPassword');
})->name('auth.resetPassword');

Route::get('/car/search', [CarController::class, 'search'])->name('car.search');
Route::get('/car/watchlist', [CarController::class, 'watchlist'])->name('car.watchlist');
Route::resource('car', CarController::class)->name('index', 'car');
