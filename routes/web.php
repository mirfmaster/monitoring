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
    return view('landing');
});
Route::get('/home', function () {
    return view('admin.dashboard');
});
Auth::routes();

Route::resource('product','ProductController')->middleware('auth');
Route::patch('/product/{id}/value','ProductController@showvalue')->name('value')->middleware('auth'); 
Route::patch('/product/{id}/give','ProductController@updatevalue')->name('updatevalue')->middleware('auth'); 

Route::resource('user','UserController')->middleware('auth');
Route::get('/dashboard', 'UserController@index')->name('dashboard')->middleware('auth');
Route::get('priviledges/account','UserController@edit')->name('user.edit')->middleware('auth');

Route::get('Priviledges','UserController@password')->name('password')->middleware('auth');
Route::patch('/Privileges/password','UserController@changePassword')->name('changepassword')->middleware('auth');
Route::get('/Privileges/remove','UserController@removeAvatar')->name('removeAvatar')->middleware('auth');
Route::patch('/privileges/avatar','UserController@updateAvatar')->name('changeavatar')->middleware('auth');
Route::get('/privileges/avatar','UserController@avatar')->name('avatar')->middleware('auth');

Route::get('/reports','ReportsController@index')->name('reports')->middleware('auth');
Route::post('PDFRequest','ReportsController@PDFrequest')->name('pdfrequest')->middleware('auth');