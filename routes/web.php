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
Route::group(['middleware' => 'auth'], function(){
  Route::get('/logout','HomeController@logout')->name('logout');
  Route::get('/', 'HomeController@index')->name('dashboard');
  Route::get('/pilihpaket','transaksiController@getpaket');
  Route::get('/tentangkami','HomeController@tentangkami');
});

Route::group(['middleware' => ['auth','checkrole:3']], function(){
  Route::get('/transaksi', 'transaksiController@index')->name('transaksi');
  Route::get('/transaksi/tambah', 'transaksiController@create')->name('tambahtransaksi');
  Route::post('/transaksi', 'transaksiController@store')->name('actiontambahtransaksi');
});

Route::group(['middleware' => ['auth','checkrole:2']], function(){
  Route::get('/rekaptransaksi', 'rekapcontroller@index')->name('rekaptransaksi');
});
