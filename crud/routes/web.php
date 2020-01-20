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



Route::middleware('adminpriv')->group(function(){
	Route::get('/users','UserController@index')->name('users.index');
	Route::get('/users/create','UserController@create')->name('users.create');
	Route::post('/users','UserController@store')->name('users.store');
	Route::get('/user/{id}','UserController@show')->name('users.show');
	Route::get('/user/{id}/edit','UserController@edit')->name('users.edit');
	Route::put('/user/{id}','UserController@update')->name('users.update');
	Route::delete('/user/{id}','UserController@destroy')->name('users.destroy');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
