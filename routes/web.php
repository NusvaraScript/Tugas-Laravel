<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\KelasController;

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/siswa/{id}', function($id) {
//     return "<h1>SAYA SISWA ID $id</h1>";
// })->where('id', '[0-9]+');

// Route::get('/siswa/{id}/{nama}', function($id, $nama) {
//     return "<h1>SAYA SISWA ID $id DENGAN NAMA $nama</h1>";
// })->where('id', '[0-9]+',)->where('nama', '[A-Za-z]+');

Route::get('siswa', [SiswaController::class, 'index']);
Route::get('siswa/{id}', [SiswaController::class, 'detail']);

Route::get('kelas', [KelasController::class, 'index']);
Route::get('kelas/{id}', [KelasController::class, 'detail']);

// Route::get('/guru/{id}', function($id) {
//     return "<h1>Saya Guru ID $id</h1>";
// })->where('id', '[0-9]+');
// Route::get('/guru/{id}/{nama}', function($id, $nama) {
//     return "<h1>Saya Guru ID $id dengan Nama $nama</h1>";
// })->where(['id' => '[0-9]+', 'nama' => '[A-Za-z]+']);

// Route::get('guru', [GuruController::class, 'index']);
// Route::get('guru/{id}/{nama}', [GuruController::class, 'detail'])->where(['id' => '[0-9]+', 'nama' => '[A-Za-z]+']);;
Route::get('/', [HalamanController::class, 'index']);
Route::get('/tentang', [HalamanController::class, 'tentang']);
Route::get('/kontak', [HalamanController::class, 'kontak']);