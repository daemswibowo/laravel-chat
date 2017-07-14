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

Route::group(['middleware'=>'auth'], function () {
	Route::group(['prefix'=>'user'], function () {
		Route::get('/data.json', 'UserController@show');
	});

	Route::group(['prefix'=>'chat'], function () {
		Route::get('/', function () {
			return view('chat');
		});

		Route::get('/messages.json', 'MessageController@show');
		Route::post('/store', 'MessageController@store');
	});
});

Route::get('/home', 'HomeController@index')->name('home');
