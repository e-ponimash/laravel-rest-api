<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::post('auth/register', function () {
    return view('home');
});
Route::get('/', function () {
    return view('home');
});
