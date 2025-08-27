<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('register', 'RegisterLoginController@register');
Route::post('login', 'RegisterLoginController@login');
Route::post('forgot-password','RegisterLoginController@forgotPassword');
Route::middleware('auth:api')->group( function () {

    Route::get('user/view', 'UserController@view');
    Route::post('edit_profile','UserController@profileUpdate');
    Route::post('change-email','UserController@changeEmailUpdate');
    Route::post('change-password','UserController@change_password');

});
