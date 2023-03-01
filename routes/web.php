<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CkpController;
use App\Http\Controllers\IkiController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\TimkerjaController;
use App\Http\Controllers\DashboardController;

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

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
// Route::get('/dashboard2', [DashboardController::class, 'dashboard2'])->middleware(['auth', 'verified'])->name('dashboard2');

Route::get('/kegiatan/pegawai', [KegiatanController::class, 'daftarPegawai'])->middleware(['auth', 'verified','penilai']);
Route::get('/kegiatan/timkerja', [KegiatanController::class, 'kegiatanTimkerja'])->middleware(['auth', 'verified']);
Route::get('/kegiatan/pegawai/{nip_lama}', [KegiatanController::class, 'kegiatanPegawai'])->middleware(['auth', 'verified','penilai']);
Route::get('/kegiatan/penilaian', [KegiatanController::class, 'penilaian'])->middleware(['auth', 'verified']);
Route::get('/kegiatan/alokasi', [KegiatanController::class, 'alokasi'])->middleware(['auth', 'verified']);
Route::resource('kegiatan', KegiatanController::class)->middleware(['auth', 'verified']);

Route::get('getkegiatan/{id}', [AjaxController::class, 'show'])->middleware(['auth', 'verified']);

Route::get('ckp/show/', [CkpController::class, 'myckp'])->middleware(['auth', 'verified']);
Route::get('ckp/show/{bulan}', [CkpController::class, 'myckp'])->middleware(['auth', 'verified']);
Route::get('ckp/checkQRpegawai/{link}', [CkpController::class, 'checkQRpegawai']);
Route::get('ckp/export/pdf/{bulan}/{pegawai_id}', [CkpController::class, 'exportpdf'])->middleware(['auth', 'verified']);
Route::get('ckp/pdf/{bulan}', [CkpController::class, 'exportmypdf'])->middleware(['auth', 'verified']);
Route::get('ckp/accept/{bulan}', [CkpController::class, 'accept'])->middleware(['auth', 'verified']);
Route::get('ckp/daftarApprove/', [CkpController::class, 'daftarApprove'])->middleware(['auth', 'verified']);
Route::get('ckp/daftarApprove/{bulan}', [CkpController::class, 'daftarApprove'])->middleware(['auth', 'verified']);
Route::get('ckp/approve/{bulan}/{pegawai_id}', [CkpController::class, 'approve'])->middleware(['auth', 'verified']);
// Route::resource('ckp', CkpController::class)->middleware(['auth', 'verified']);

Route::resource('skp', IkiController::class)->middleware(['auth', 'verified']);

Route::get('rekap/kegiatan/', [RekapController::class, 'rekapKegiatan'])->middleware(['auth', 'verified','admin']);
Route::post('rekap/kegiatan/', [RekapController::class, 'rekapKegiatan'])->middleware(['auth', 'verified','admin']);
Route::get('rekap/harian/', [RekapController::class, 'rekapKegiatanHarian'])->middleware(['auth', 'verified','admin']);
Route::get('rekap/ckp/', [RekapController::class, 'rekapCKP'])->middleware(['auth', 'verified','admin']);
Route::get('rekap/ckp/{bulan}', [RekapController::class, 'rekapCKP'])->middleware(['auth', 'verified','admin']);

Route::resource('pegawai', PegawaiController::class)->middleware(['auth', 'verified']);

Route::resource('timkerja', TimkerjaController::class)->middleware(['auth', 'verified']);

Route::resource('user', UserController::class)->middleware(['auth', 'verified','admin']);
Route::get('/profile', [UserController::class, 'profile'])->middleware(['auth', 'verified'])->name('profile');
Route::post('updatePassword', [UserController::class, 'update_password'])->middleware(['auth', 'verified']);

Route::get('/', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('home');


// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
