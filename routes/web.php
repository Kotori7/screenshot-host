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
    return redirect('/home', 301);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user', 'UserController@index')->name('user');
//Route::post('/user', 'UserController@update');
Route::post('/user/apikey', 'UserController@apikey')->name('apikey');

Route::post('/upload', 'UploadController@upload')->name('upload');

Route::post('/file/{filename}/delete', 'FileController@delete')->name('delete-file');