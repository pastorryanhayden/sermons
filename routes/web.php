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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::middleware(['auth'])->group(function () {

	Route::get('/home', 'HomeController@index')->name('home');
	Route::resource('sermons', 'SermonsController');
	Route::get('/sermons/{id}/text', 'SermonsTextsController@edit');
	Route::post('/sermons/{id}/text', 'SermonsTextsController@store');
	Route::delete('/sermons/{id}/text/{text}', 'SermonsTextsController@destroy');
	Route::get('/sermons/{id}/media', 'SermonsMediaController@edit');
	Route::post('/sermons/{id}/media', 'SermonsMediaController@store');
	Route::get('/sermons/{id}/content', 'SermonsContentController@edit');
	Route::post('/sermons/{id}/content', 'SermonsContentController@store');
	Route::get('/prayer/1', 'HomeController@index')->name('home');
	Route::resource('requestcategories', 'RequestCategoriesController');
	Route::resource('speakers', 'SpeakersController');



});
