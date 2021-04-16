<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\MahasiswaController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('articles', ArticleController::class);

Route::get('/article/cetak_pdf',[ArticleController::class, 'cetak_pdf']);

Route::resource('mahasiswa', MahasiswaController::class);

Route::get('mahasiswa/nilai/{Nim}', [MahasiswaController::class, 'nilai'])->name('mahasiswa.nilai');

Route::get('/mahasiswa/cetak_khs/{Nim}', [MahasiswaController::class, 'cetak_khs'])->name('mahasiswa.cetak_khs');
