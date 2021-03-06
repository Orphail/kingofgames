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
    Route::resource('genre', 'GenreController');
    Route::resource('console', 'ConsoleController');
    Route::resource('rank', 'RankController');
    Route::resource('videogame', 'VideogameController');
    Route::resource('tournament', 'TournamentController');

    Route::get('inscription/{tournamentId}', [
        'as' => 'inscription.index', 'uses' => 'InscriptionController@index']);
    Route::get('kogGame/{tournamentId}', [
        'as' => 'kogGame.index', 'uses' => 'KogGameController@index']);

    Route::get('inscription/create/{tournamentId}', [
        'as' => 'inscription.create', 'uses' => 'InscriptionController@create']);
    Route::get('kogGame/create/{tournamentId}', [
        'as' => 'kogGame.create', 'uses' => 'KogGameController@create']);

    Route::get('inscription/edit/{tournamentId}/{nickname}', [
        'as' => 'inscription.edit', 'uses' => 'InscriptionController@edit']);
    Route::get('kogGame/edit/{tournamentId}/{videogame}', [
        'as' => 'kogGame.edit', 'uses' => 'KogGameController@edit']);

    Route::post('inscription/store/{tournamentId}', [
        'as' => 'inscription.store', 'uses' => 'InscriptionController@store']);
    Route::post('kogGame/store/{tournamentId}', [
        'as' => 'kogGame.store', 'uses' => 'KogGameController@store']);

    Route::patch('inscription/update/{tournamentId}/{nickname}', [
        'as' => 'inscription.update', 'uses' => 'InscriptionController@update']);
    Route::patch('kogGame/update/{tournamentId}/{videogame}', [
        'as' => 'kogGame.update', 'uses' => 'KogGameController@update']);

    Route::delete('inscription/destroy/{tournamentId}/{nickname}', [
        'as' => 'inscription.destroy', 'uses' => 'InscriptionController@destroy']);
    Route::delete('kogGame/destroy/{tournamentId}/{videogame}', [
        'as' => 'kogGame.destroy', 'uses' => 'KogGameController@destroy']);

    Route::get('inscriptionResult/{tournamentId}/{nickname}', [
        'as' => 'inscriptionResult.index', 'uses' => 'InscriptionResultController@index']);
    Route::get('kogGameResult/{tournamentId}/{videogame}', [
        'as' => 'kogGameResult.index', 'uses' => 'KogGameResultController@index']);

    Route::get('change-value', ['as' => 'itemcms.change-value', 'uses' => 'CommonController@changeValue']);
    Route::get('change-boolean', ['as' => 'itemcms.change-boolean', 'uses' => 'CommonController@changeBoolean']);

    Route::get('member/login-as/{user_id}',['as'=>'member.login-as-member','uses'=>'UserController@loginAsMember']);
});

Route::middleware(['auth:web'])->namespace('Member')->group(function() {
    Route::get('dashboard',['as'=>'dashboard.index','uses'=>'DashboardController@index']);
});
