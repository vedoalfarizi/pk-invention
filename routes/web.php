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
    $infos = \App\Models\info::all();
    $beritas = \App\Models\beritas::all();
    return view('welcome',compact('infos','beritas'));
});

Route::get('/lapor' ,function () {
    if(auth::user()== null){
        return view('auth.login');
    }
    return view('lapor');
});

Route::get('/cekkeamanan' ,function () {
    return view('cekkeamanan');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('perkaras', 'perkaraController');

Route::resource('infos', 'infoController');
Route::post('infos-filter', 'infoController@showWithFilter')->name('infos.filter');
Route::get('infos/cat/{id}', 'infoController@showByCatagories');

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
Route::get('/pelaporans/tindakLanjut/{id}', 'progresLaporanController@tindak');
Route::get('/pelaporans/dokumen/{id}', 'progresLaporanController@tindakDokumen');

Route::get('/pelaporans/cari', 'progresLaporanController@cari');
Route::get('/pelaporans/cariPerkara', 'progresLaporanController@cariPerkara');

//User Laporan
Route::post('/lapor/add', 'laporanUserController@create');

//User Profil
Route::get('/user/profil','profilUserController@index');
Route::get('/laporan/edit/{id}', function ($id) {
    $laporan = \App\Models\laporan::find($id);
        return view('user.profil.edit_lapor', compact('laporan'));
});

Route::get('/info/{id}', 'profilUserController@showInfo');
Route::get('/laporan/tindak/{id}', 'profilUserController@showTindak');

Route::get('/cari', 'cariInfoController@index');

Route::resource('beritas', 'beritasController');

//berita
Route::post('/addBerita', 'beritasController@store');
Route::get('/kriminalradius', 'infoController@radiusKriminal');

