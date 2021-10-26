<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home','HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin','middleware' => 'auth'],function (){

    //dashboard
    Route::get('dashboard', 'AdminHomeController@index')->name('admin.dashboard');

    //Setting
    Route::get('settings', 'SettingController@index')->name('admin.setting');
    Route::post('settings/store', 'SettingController@store')->name('admin.setting.store');

    //profile
    Route::get('profile','AdminUserController@profile')->name('admin.profile');
    Route::post('profile','AdminUserController@profileUpdate')->name('admin.upadte');

    //user
    Route::resource('user','UserController'); 

    //admin
    Route::resource('admin-user','AdminUserController'); 

    //logs
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
});
