<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\FavoriteController;



// web.php
// web.php
Route::get('/cities/{stateId}', [CarController::class, 'getCitiesByState']);
Route::get('/models/{makerId}', [CarController::class, 'getModelsByMaker']);

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/login', function () {
    return view('auth.login');
})->name('auth.login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.loginAction');

Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

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

Route::post('/car/create', [CarController::class, 'createCar'])->name('car.createCar');
Route::get('/car/search', [CarController::class, 'search'])->name('car.search');
Route::post('/car/search', [CarController::class, 'searchAction'])->name('car.searchAction');
Route::get('/car/watchlist', [CarController::class, 'watchlist'])->name('car.watchlist');
Route::get('/car/create', [CarController::class, 'create'])->name('car.create');
Route::get('/car/edit/{car_id}', [CarController::class, 'edit'])->name('car.edit');
Route::get('/car/{id}', [CarController::class, 'show'])->name('car.show');
Route::get('/car', [CarController::class, 'index'])->name('car');
Route::post('/favorite/toggle/{car}', [FavoriteController::class, 'toggle'])->name('favorite.toggle');

Route::get('/car/delete/{car_id}', [CarController::class, 'destroy'])->name('car.delete');
