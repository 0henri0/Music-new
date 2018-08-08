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
//
Route::get('/', 'Pages\HomeController@index')->name('home');


Route::get('categories', 'Pages\ListController@listCategory');
Route::get('songs', 'Pages\ListController@listSong');
Route::get('albumsingers', 'Pages\ListController@listAlbum');
Route::get('albumsinger/song/{id}', 'Pages\ListController@listSongOfAlbum');
Route::get('singers', 'Pages\ListController@listSinger');
//
//Route::resource('countries', 'CountryController');
//Route::resource('singers', 'SingerController');
//Route::resource('albumsingers', 'AlbumSingerController');
//Route::resource('albumusers', 'AlbumUserController');
//Auth::routes();
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'admin', 'as' => 'admin'], function () {
    Route::get("users/delete/{id}", 'Admin\UserController@destroy');
    Route::resource('users', 'Admin\UserController');
    Route::get("songs/delete/{id}", 'Admin\SongController@destroy');
    Route::resource('songs', 'Admin\SongController');
    Route::get("countries/delete/{id}", 'Admin\CountryController@destroy');
    Route::resource('countries', 'Admin\CountryController');
    Route::get("singers/delete/{id}", 'Admin\SingerController@destroy');
    Route::resource('singers', 'Admin\SingerController');
    Route::get("categories/delete/{id}", 'Admin\CategoryController@destroy');
    Route::resource('categories', 'Admin\CategoryController');
    Route::get("albumsingers/delete/{id}", 'Admin\AlbumSingerController@destroy');
    Route::resource('albumsingers', 'Admin\AlbumSingerController');

    Route::get("{id}/albumsongs/delete/{id2}", 'Admin\AlbumSongController@destroy');
    Route::resource("{id}/albumsongs", 'Admin\AlbumSongController');

});
