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

Route::get('/', function () {
    return redirect()->route('login');
});

// Auth
Route::get('login','AuthController@login')->middleware('guest')->name('login');
Route::post('login', 'AuthController@postLogin')->middleware('guest')->name('post-login');
Route::get('edit-password','AuthController@editPassword')->middleware('auth')->name('edit-password');
Route::put('update-password','AuthController@updatePassword')->middleware('auth')->name('update-password');
Route::get('profile','AuthController@profile')->middleware('auth')->name('profile');
Route::get('edit-profile','AuthController@editProfile')->middleware('auth')->name('edit-profile');
Route::put('update-profile', 'AuthController@updateProfile')->middleware('auth')->name('update-profile');
Route::get('hapus-foto', 'AuthController@hapusFoto')->middleware('auth')->name('hapus-foto');

Route::get('/logout','AuthController@logout')->middleware('auth')->name('logout');

Route::get('dashboard','PageController@dashboard')->middleware('auth')->name('dashboard');

//user
Route::get('/users','UserController@index')->middleware('auth')->name('users.index');
Route::get('/users/create','UserController@create')->middleware('auth')->name('users.create');
Route::post('/users','UserController@store')->middleware('auth')->name('users.store');
Route::get('/users/{id}','UserController@show')->middleware('auth')->name('users.show');
Route::get('/users/{id}/edit','UserController@edit')->middleware('auth')->name('users.edit');
Route::put('/users/{id}', 'UserController@update')->middleware('auth')->name('users.update');
Route::get('/user/{id}/hapus-foto', 'UserController@hapusFoto')->middleware('auth')->name('user.hapus-foto');
Route::get('/users/{user}/reset-password','UserController@resetPassword')->middleware('auth')->name('users.reset-password');
Route::put('/users/{user}/update-password','UserController@updatePassword')->middleware('auth')->name('users.update-password');
Route::delete('/users/{id}','UserController@destroy')->middleware('auth')->name('users.destroy');

//instansi
Route::get('/instansi','InstansiController@index')->name('instansi.index');
Route::get('/instansi/{id}/edit','InstansiController@edit')->middleware('auth')->name('instansi.edit');
Route::put('/instansi/{id}','InstansiController@update')->middleware('auth')->name('instansi.update');


Route::get('/log','ActivityLogController@index')->name('activitylog.index');
