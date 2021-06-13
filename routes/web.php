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
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/beranda', function () {
    return view('beranda');
})->name('beranda');

Route::post('/postlogin', 'LoginController@postlogin')->name('postlogin');
Route::get('/logout', 'LoginController@logout')->name('logout');

Route::group(['middleware' => ['auth']], function (){ //untuk membatasi hak akses yg belum login
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/data-pegawai', 'PegawaiController@index')->name('data-pegawai');
Route::get('/create-pegawai', 'PegawaiController@create')->name('create-pegawai');
Route::get('/simpan-pegawai', 'PegawaiController@store')->name('simpan-pegawai');
Route::get('/edit-pegawai/{id}', 'PegawaiController@edit')->name('edit-pegawai');
Route::get('/update-pegawai/{id}', 'PegawaiController@update')->name('update-pegawai');
Route::get('/delete-pegawai/{id}', 'PegawaiController@destroy')->name('delete-pegawai');
Route::get('/cetak-pegawai', 'PegawaiController@cetakPegawai')->name('cetak-pegawai');
Route::get('/cetak-data-pegawai-form', 'PegawaiController@cetakForm')->name('cetak-data-pegawai-form');
Route::get('/cetak-data-pertanggal/{tglawal}/{tglakhir}', 'PegawaiController@cetakPegawaiPertanggal')->name('cetak-data-pertanggal');

Route::get('/data-gambar', 'UploadgambarController@index')->name('data-gambar');
Route::get('/create-gambar', 'UploadgambarController@create')->name('create-gambar');
Route::get('/simpan-gambar', 'UploadgambarController@store')->name('simpan-gambar');



});


