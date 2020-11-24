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
  Route::get('/transaksi/{id}/detail', 'transaksiController@show')->name('detailtransaksi');
  Route::put('/transaksi/{id}', 'transaksiController@statuspengantaran')->name('ubahstatuspengantaran');
  Route::get('/antarjemput', 'antarjemputController@index')->name('antarjemput');
  Route::get('/antarjemput/{id}', 'antarjemputController@edit')->name('verifikasi');
  Route::put('/antarjemput/{id}', 'antarjemputController@update')->name('actiontambahberat');
  Route::put('/antarjemput/verifikasi/{id}', 'antarjemputController@verifikasi')->name('actionverifikasi');
  Route::put('/antarjemput/tolak/{id}', 'antarjemputController@tolak')->name('actiontolak');
  Route::get('/kelolanolemari', 'nolemariController@index')->name('nolemari');
  Route::get('/kelolanolemari/tambah', 'nolemariController@store')->name('tambahnolemari');

});

Route::group(['middleware' => ['auth','checkrole:2']], function(){
  Route::get('/rekaptransaksi', 'rekapcontroller@index')->name('rekaptransaksi');
  Route::get('/rekaptransaksi/cari', 'rekapcontroller@rekap')->name('rekaptransaksi');
  Route::get('/statusoperasional','operasionalController@edit')->name('ubahoperasional');
  Route::put('/statusoperasional/{id}','operasionalController@update')->name('actionubahoperasional');
});

Route::group(['middleware' => ['auth','checkrole:4']], function(){
  Route::get('/laundrysekarang', 'pesanlaundryController@create')->name('formpesanlaundry');
  Route::post('/laundrysekarang', 'pesanlaundryController@store')->name('actionpesanlaundry');
  Route::get('/riwayattransaksi','pesanlaundryController@index')->name('riwayattransaksi');
  Route::get('/cekpesanan','pesanlaundryController@cekpesanan')->name('cekpesanan');
  Route::get('/riwayattransaksi/penilaian/{id}','pesanlaundryController@createrating')->name('tambahrating');
  Route::post('/riwayattransaksi/penilaian','pesanlaundryController@storerating')->name('actionrating');
});
