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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/admin/login','DashboardController@showLoginForm')->name('admin.login');

Route::middleware(['adminpriv','auth'])->prefix('/admin')->group(function(){
	Route::get('/dashboard','DashboardController@index')->name('admin.dashboard');
	Route::get('/users','UserController@index')->name('users.index');
	Route::get('/user/create','UserController@create')->name('users.create');
	Route::post('/user','UserController@store')->name('users.store');
	Route::get('/user/{id}','UserController@show')->name('users.show');
	Route::get('/user/{id}/edit','UserController@edit')->name('users.edit');
	Route::put('/user/{id}','UserController@update')->name('users.update');
	Route::delete('/user/{id}','UserController@destroy')->name('users.destroy');
	Route::get('/settings','UserController@showAdminSettings')->name('admin.settings');
	Route::get('/manage','DashboardController@manage')->name('admin.manage');
	Route::post('/manage','DashboardController@setPermissions')->name('admin.setpermissions');
});






// Route::name('user')->group(function(){
// 	Route::get('/','PostController@index')->name('index');
// });

Route::middleware('auth')->group(function(){
	Route::get('/user/settings','UserController@showUserSettings')->name('users.settings');
	Route::get('user/password','UserController@showChangePasswordForm')->name('users.password');
	Route::post('user/changepassword','UserController@changePassword')->name('users.changepassword');
	

	Route::get('/user/avatar','HomeController@showUploadAvatarForm')->name('user.avatar');
	Route::put('/user/uploadavatar','HomeController@UploadAvatar')->name('user.uploadavatar');

	Route::get('/post/create','PostController@create')->name('post.create');
	Route::post('/post','PostController@store')->name('post.store');
	Route::get('/post/{id}/edit','PostController@edit')->name('post.edit');
	Route::put('/post/{id}','PostController@update')->name('post.update');
	Route::delete('/post/{id}','PostController@destroy')->name('post.destroy');
	Route::get('/todo','ToDoListController@index')->name('todolist');
	Route::post('/todo','ToDoListController@ajaxStore')->name('storelist');
	Route::get('/todo/lists','ToDoListController@getAllLists')->name('getlists');
	Route::post('/todo/delete','ToDoListController@deleteList')->name('deletelist');

});


Route::get('/','PostController@index')->name('index');
Route::get('/post/{id}','PostController@show')->name('post.show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
