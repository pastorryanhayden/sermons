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
Route::get('/terms', 'RegisterChurchController@terms');
Route::post('/terms', 'RegisterChurchController@register');
Route::get('/churches/{church}/{type}', 'PublicSermonsController@home');
Route::get('/churches/{church}/{type}/search', 'PublicSearchController@search');
Route::get('/churches/{church}/{type}/sermons', 'PublicSermonsController@index');
Route::get('/churches/{church}/{type}/sermons-scripture', 'PublicSermonsController@indexScripture');
Route::get('/churches/{church}/{type}/sermons-series', 'PublicSermonsController@indexSeries');
Route::get('/churches/{church}/{type}/sermons-speakers', 'PublicSermonsController@indexSpeakers');
Route::get('/churches/{church}/{type}/sermons/{sermon}', 'PublicSermonsController@show');
Route::get('/churches/{church}/{type}/speakers', 'PublicSpeakersController@index');
Route::get('/churches/{church}/{type}/speakers/{speaker}', 'PublicSpeakersController@show');
Route::get('/sermon/{sermon}/player', 'PublicSermonsController@player');
Route::get('/churches/{church}/{type}/series', 'PublicSeriesController@index');
Route::get('/churches/{church}/{type}/series/{series}', 'PublicSeriesController@show');
Route::middleware(['auth'])->group(function () {

    Route::get('/home', 'SermonsController@index')->name('home');
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
    Route::resource('series', 'SeriesController');
});
