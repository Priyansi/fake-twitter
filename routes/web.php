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



Auth::routes();

Route::get('/', 'StatusesController@index');

Route::post('/follow/{user}', 'FollowsController@store');

Route::get('/status/create', 'StatusesController@create');

Route::post('/status', 'StatusesController@store');

Route::get('/status/{status}', 'StatusesController@show');

Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');

Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');

Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');
