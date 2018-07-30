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

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

Route::get('/page-view/{slug}', ['as' => 'page-view.show', 'uses' => 'PageController@show']);

Route::get('/kogcms', ['as' => 'control.panel', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::get('/change-position', 'Admin\PositionController@update')->name('position');

Route::middleware(['auth:web'])->namespace('Common')->group(function() {
    Route::get('my-profile',['as'=>'my-profile','uses'=>'MyProfileController@index']);
    Route::patch('my-profile/{user}',['as'=>'my-profile.update','uses'=>'MyProfileController@update']);
});

Route::middleware(['auth:web','admin.protect'])->namespace('Kogcms')->group(function() {
    Route::resource('admin','AdminController');
    Route::resource('user','UserController');
    Route::resource('page','PageController');
    Route::resource('parameter','ParameterController');
    Route::resource('blog', 'BlogController');
    Route::resource('blogCategory', 'BlogCategoryController');
    Route::resource('tag', 'TagController');
    Route::resource('home-banner', 'HomeBannerController');
    Route::get('change-boolean', ['as' => 'itemcms.change-boolean', 'uses' => 'CommonController@changeBoolean']);
    Route::get('change-order', ['as' => 'itemcms.change-order', 'uses' => 'CommonController@changeOrder']);

    Route::get('member/login-as/{user_id}',['as'=>'member.login-as-member','uses'=>'UserController@loginAsMember']);
});

Route::middleware(['auth:web'])->namespace('Member')->group(function() {
    Route::get('dashboard',['as'=>'dashboard.index','uses'=>'DashboardController@index']);
});
