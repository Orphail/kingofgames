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
    Route::get('tournamentGame/{tournamentId}', [
        'as' => 'tournamentGame.index', 'uses' => 'TournamentGameController@index']);

    Route::get('inscription/create/{tournamentId}', [
        'as' => 'inscription.create', 'uses' => 'InscriptionController@create']);
    Route::get('tournamentGame/create/{tournamentId}', [
        'as' => 'tournamentGame.create', 'uses' => 'TournamentGameController@create']);

    Route::get('inscription/edit/{id}', ['as' => 'inscription.edit', 'uses' => 'InscriptionController@edit']);
    Route::get('tournamentGame/edit/{id}', ['as' => 'tournamentGame.edit', 'uses' => 'TournamentGameController@edit']);

    Route::post('inscription/store/{tournamentId}', [
        'as' => 'inscription.store', 'uses' => 'InscriptionController@store']);
    Route::post('tournamentGame/store/{tournamentId}', [
        'as' => 'tournamentGame.store', 'uses' => 'TournamentGameController@store']);

    Route::patch('inscription/update/{tournamentId}/{inscriptionId}', [
        'as' => 'inscription.update', 'uses' => 'InscriptionController@update']);
    Route::patch('tournamentGame/update/{tournamentId}/{tournamentGameId}', [
        'as' => 'tournamentGame.update', 'uses' => 'TournamentGameController@update']);

    Route::delete('inscription/destroy/{id}', [
        'as' => 'inscription.destroy', 'uses' => 'InscriptionController@destroy']);
    Route::delete('tournamentGame/destroy/{id}', [
        'as' => 'tournamentGame.destroy', 'uses' => 'TournamentGameController@destroy']);

    Route::get('change-boolean', ['as' => 'itemcms.change-boolean', 'uses' => 'CommonController@changeBoolean']);
    Route::get('change-order', ['as' => 'itemcms.change-order', 'uses' => 'CommonController@changeOrder']);

    Route::get('member/login-as/{user_id}',['as'=>'member.login-as-member','uses'=>'UserController@loginAsMember']);
});

Route::middleware(['auth:web'])->namespace('Member')->group(function() {
    Route::get('dashboard',['as'=>'dashboard.index','uses'=>'DashboardController@index']);
});
