<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

/*
Route::post('auth/register', 'AuthController@register');
Route::post('auth/login', 'AuthController@login');
Route::group(['middleware' => 'jwt.auth'], function(){
    Route::get('auth/user', 'AuthController@user');
});
Route::group(['middleware' => 'jwt.refresh'], function(){
    Route::get('auth/refresh', 'AuthController@refresh');
    Route::post('auth/logout', 'AuthController@logout');
});
*/
//Auth::routes();

Route::group(['middleware' => 'auth:api'], function() {
    Route::get('/shows', 'ShowController');
    Route::get('/shows/{show}/events', 'EventController');
    Route::get('/events/{event}/places', 'PlaceController@index');
    Route::post('/events/{event}/reserve', 'PlaceController@reserve');
});