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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/{id}', 'HomeController@show')->name('show');
Route::post('/home', 'YoutubeController@add')->name('video');
Route::get('/start', 'StartController@index')->name('start');

Route::post('get-video', 'YoutubeController@get');
Route::post('add-video', 'YoutubeController@add');
