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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('perkaras', 'perkaraController');

Route::resource('infos', 'infoController');

Route::resource('profiles', 'profileController');

Route::resource('feedbackInfos', 'feedbackInfoController');

Route::resource('komentarInfos', 'komentarInfoController');

Route::resource('laporans', 'laporanController');

Route::resource('perkembanganLaps', 'perkembanganLapController');

//pengguna
Route::get('/pengguna', 'penggunaController@index');
Route::get('/pengguna/verifikasi/{id}', 'penggunaController@verifikasi');

//Progress laporan
Route::get('/pelaporans', 'progresLaporanController@index');
Route::get('/pelaporans/cetak/{id}', function ($id) {
    $laporan = \App\Models\laporan::where('id',$id)->first();
    return view('admin.pelaporans.cetak_surat', compact('laporan'));
});


