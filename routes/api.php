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

Route::middleware('jwt.refresh')->post('/refreshToken', function () {
    return "";
});
Route::post('/registration', 'Api\UserController@registration');
Route::post('/login', 'Api\UserController@login');

Route::group(['middleware' => 'VerifyJWTToken'], function () {
    Route::post('/users', 'Api\UserController@getAppUsers');
    Route::post('/profile', 'Api\UserController@profile');
    Route::post('/logout', 'Api\UserController@logout');
});

