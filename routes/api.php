<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('signup', 'AuthController@register');
Route::post('login', 'AuthController@login');


Route::middleware(['jwt.auth'])->group(function(){
    Route::get('auth/user', 'AuthController@user');
    Route::post('auth/logout', 'AuthController@logout');
});

Route::middleware('jwt.refresh')->group(function(){
    Route::get('/token/refresh', 'AuthController@refresh');
});

