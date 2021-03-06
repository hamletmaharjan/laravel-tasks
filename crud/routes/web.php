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

Route::middleware('auth')->group(function(){
	Route::get('/user/settings','UserController@showSettings')->name('users.settings');
	Route::get('user/password','UserController@showChangePasswordForm')->name('users.password');
	Route::post('user/changepassword','UserController@changePassword')->name('users.changepassword');
});

Route::middleware(['adminpriv','auth'])->group(function(){
	// Route::get('/user/settings','UserController@showSettings')->name('users.settings');
	// Route::get('user/password','UserController@showChangePasswordForm')->name('users.password');
	// Route::post('user/changepassword','UserController@changePassword')->name('users.changepassword');
	Route::get('/users','UserController@index')->name('users.index');
	Route::get('/user/create','UserController@create')->name('users.create');
	Route::post('/users','UserController@store')->name('users.store');
	Route::get('/user/{id}','UserController@show')->name('users.show');
	Route::get('/user/{id}/edit','UserController@edit')->name('users.edit');
	Route::put('/user/{id}','UserController@update')->name('users.update');
	Route::delete('/user/{id}','UserController@destroy')->name('users.destroy');
	
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
