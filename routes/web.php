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

Route::get('/home', 'HomeController@index');

Route::resource('perkaras', 'perkaraController');

Route::resource('infos', 'infoController');

Route::resource('profiles', 'profileController');

Route::resource('feedbackInfos', 'feedbackInfoController');

Route::resource('komentarInfos', 'komentarInfoController');

Route::resource('laporans', 'laporanController');

Route::resource('perkembanganLaps', 'perkembanganLapController');