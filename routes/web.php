<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VerificationController;




Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/login', function () {
    return view('auth.login');
})->name('auth.login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.loginAction');

Route::get('/signup', function () {
    return view('auth.signup');
})->name('auth.signup');
Route::post('/signup', [AuthController::class, 'signup'])->name('auth.signupAction');

Route::get('/verifyEmail/{email}', [VerificationController::class, 'addEmailVerify'])->name('auth.verifyEmail');
Route::post('/verifyEmail', [VerificationController::class, 'resendToken'])->name('auth.resendTokenAction');

Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
->middleware(['signed', 'throttle:6,1'])
->name('verification.verify');


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

