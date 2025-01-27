<?php

use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    return view('home.index');
});
Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/signup', function () {
    return view('auth.signup');
});
