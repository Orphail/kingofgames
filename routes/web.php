<?php

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

Auth::routes();

Route::get('/','Auth\LoginController@showLoginForm');

Route::middleware(['auth:web'])->namespace('Common')->group(function() {
    Route::get('my-profile',['as'=>'my-profile','uses'=>'MyProfileController@index']);
    Route::patch('my-profile/{user}',['as'=>'my-profile.update','uses'=>'MyProfileController@update']);
});

Route::middleware(['auth:web','admin.protect'])->namespace('Admin')->group(function() {
    Route::resource('admin','AdminController');
    Route::resource('page','PageController');
    Route::resource('parameter','ParameterController');
});
