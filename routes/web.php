<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/posts', 'EntriesController@index');
Route::get('/posts/new', 'EntriesController@write');
Route::post('/posts', 'EntriesController@save');
Route::get('/posts/{entry}', 'EntriesController@show');
Route::get('/posts/{entry}/edit', 'EntriesController@edit');
Route::get('/posts/{entry}/delete', 'EntriesController@confirmDelete');
Route::delete('posts/{entry}', 'EntriesController@delete');

Route::patch('/posts/{entry}', 'VersionsController@update');