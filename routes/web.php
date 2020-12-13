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
    return view('landingpage');
});
Route::get('/landingpage','dashboardController@landingpage')->name('landingpage');
Auth::routes();
Route::post('/register','registerController@store')->name('registrasi');
Route::post('/registerlaundry','registerController@registerlaundry')->name('registrasilaundry');
Route::group(['middleware' => 'auth'], function(){
  Route::get('/dashboard', 'dashboardController@index')->name('dashboard');
  Route::get('/pilihpaket','transaksiController@getpaket');
  Route::get('/tentangkami','dashboardController@tentangkami');
  Route::get('/profile','dashboardController@profile')->name('profile');
  Route::get('/editprofile','dashboardController@editprofile')->name('editprofile');
  Route::put('/editprofile','dashboardController@updateprofile')->name('actioneditprofile');
});

Route::group(['middleware' => ['auth','checkrole:1']], function(){
  Route::get('/manajemenlaundry','adminController@manajemenlaundry')->name('mnjlaundry');
  Route::get('/manajemenpelanggan','adminController@manajemenpelanggan')->name('mnjpelanggan');
  Route::get('/manajemenpelanggan/{id}/detail','adminController@detailpelanggan')->name('detailplg');
  Route::delete('/manajemenpelanggan/{id}/delete','adminController@deletepelanggan')->name('deletelplg');
  Route::put('/manajemenpelanggan/{id}/verifikasi','adminController@verifpelanggan')->name('verifpelanggan');
  Route::get('/manajemenlaundry/{id}/detail','adminController@detailtempatlaundry')->name('detaillaundry');
  Route::delete('/manajemenlaundry/{id_tempat_laundry}/delete','adminController@deletetempatlaundry')->name('deletelaundry');
  Route::put('/manajemenlaundry/{id}/verifikasi','adminController@verifpemilik')->name('verifpemilik');
  Route::put('/manajemenpelanggan/{id}/tolak','adminController@tolakpelanggan')->name('tolakpelanggan');
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
  Route::get('/profillaundry','dashboardController@profillaundry')->name('profillaundry');
  Route::get('/editprofillaundry','dashboardController@editprofilelaundry')->name('editprofillaundry');
  Route::put('/editprofillaundry','dashboardController@updateprofilelaundry')->name('acteditprofillaundry');
  Route::get('/manajemenkaryawan','pemilikController@index')->name('daftarkaryawan');
  Route::get('/manajemenkaryawan/tambah','pemilikController@create')->name('tambahkaryawan');
  Route::post('/manajemenkaryawan/tambah','pemilikController@store')->name('acttambahkaryawan');
  Route::get('/manajemenkaryawan/{id}/detail','pemilikController@show')->name('detailkaryawan');
  Route::delete('/manajemenkaryawan/{id}/delete','pemilikController@destroy')->name('deletekaryawan');
});

Route::group(['middleware' => ['auth','checkrole:4']], function(){
  Route::get('/laundrysekarang/{id}', 'pesanlaundryController@create')->name('formpesanlaundry');
  Route::post('/laundrysekarang/{idtempatlaundry}', 'pesanlaundryController@store')->name('actpesanlaundry');
  Route::get('/riwayattransaksi','pesanlaundryController@index')->name('riwayattransaksi');
  Route::get('/cekpesanan','pesanlaundryController@cekpesanan')->name('cekpesanan');
  Route::get('/riwayattransaksi/penilaian/{id}','pesanlaundryController@createrating')->name('tambahrating');
  Route::post('/riwayattransaksi/penilaian','pesanlaundryController@storerating')->name('actionrating');
  Route::get('/cari','dashboardController@cari')->name('carilaundry');
  Route::get('/tentanglaundry/{id}','dashboardController@tentanglaundry')->name('tentanglaundry');
});
