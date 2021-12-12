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
    return view('landing.index');
});

Route::get('/buku','BukuController@index')->middleware('admin');
Route::get('/tambah-buku','BukuController@create')->name('buku.create');
Route::post('/buku','BukuController@store')->name('buku.store');
Route::GET('/buku/delete/{id}','BukuController@destroy')->name('buku.destroy');
Route::get('/buku/konfirmasi/{id}','BukuController@konfirmasi')->name('buku.konfirmasi');
Route::get('/buku/edit/{id}','BukuController@edit')->name('buku.edit');
Route::post('/buku/update/{id}','BukuController@update')->name('buku.update');
Route::get('/buku/search','BukuController@search')->name('buku.search');

Route::get('/baca-buku','BacaBukuController@index')->name('baca.index');
Route::get('/buku/info/{id}','BacaBukuController@info')->name('buku.info');
Route::get('/baca/search','BacaBukuController@search')->name('baca.search');


Route::get('/buku/comment/{id}','CommentController@index')->name('buku.comment');
Route::post('/buku/comment','CommentController@store')->name('comment.store');


Route::get('/login','LoginController@index')->middleware('guest')->name('login');
Route::POST('/login','LoginController@authenticate');
Route::POST('/logout','LoginController@logout');
Route::get('/register','RegisterController@index')->middleware('guest');
Route::POST('/register','RegisterController@store')->name('register.store');


Route::get('/data-user/edit/{id}','DataUserController@edit')->name('user.edit')->middleware('admin');
Route::post('/data-user/update/{id}','DataUserController@update')->name('user.update')->middleware('admin');
Route::get('/data-user','DataUserController@index')->middleware('admin');
Route::get('/data-user/konfirmasi/{id}','DataUserController@konfirmasi')->name('user.konfirmasi');
Route::GET('/data-user/delete/{id}','DataUserController@destroy')->name('user.destroy');



Route::get('/dashboard','DashBoardController@index')->middleware('auth');

Route::get('/like-manga/{id}', 'BacabukuController@likemanga')->name('like.manga');
