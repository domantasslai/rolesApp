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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-user')->group(function(){
  Route::get('/users', 'UsersController@index')->name('users.index');
});

Route::get('/p/{user}', 'ProfilesController@show')->name('user.show');
Route::get('/p/{user}/edit', 'ProfilesController@edit')->name('user.edit');
Route::put('/p/{user}', 'ProfilesController@update')->name('user.update');
