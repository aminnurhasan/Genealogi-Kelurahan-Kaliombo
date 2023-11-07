<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminWargaController;
use App\Http\Controllers\AdminPasanganController;
use App\Http\Controllers\AdminSilsilahController;
use App\Http\Controllers\AdminChartController;

use App\Http\Controllers\WargaHomeController;
use App\Http\Controllers\WargaProfilController;
use App\Http\Controllers\WargaSilsilahController;
use App\Http\Controllers\WargaAnakController;

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
    return view('/welcome');
});

Auth::routes();

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Kelola Warga
    Route::get('admin/warga', [AdminWargaController::class, 'index'])->name('warga.index');
    Route::get('admin/warga/create', [AdminWargaController::class, 'create'])->name('warga.create');
    Route::post('admin/warga/store', [AdminWargaController::class, 'store'])->name('warga.store');
    Route::get('admin/warga/status/{id}', [AdminWargaController::class, 'status'])->name('statusWarga');
    Route::get('admin/warga/{id}', [AdminWargaController::class, 'show'])->name('warga.show');
    Route::get('admin/warga/{id}/edit', [AdminWargaController::class, 'edit'])->name('warga.edit');
    Route::post('admin/warga/{id}/update', [AdminWargaController::class, 'update'])->name('warga.update');

    // Kelola Pasangan
    Route::get('admin/pasangan', [AdminPasanganController::class, 'index'])->name('pasangan.index');
    Route::get('admin/pasangan/create', [AdminPasanganController::class, 'create'])->name('pasangan.create');
    Route::post('admin/pasangan/store', [AdminPasanganController::class, 'store'])->name('pasangan.store');
    Route::get('admin/pasangan/status/{id}', [AdminPasanganController::class, 'status'])->name('statusPasangan');
    Route::get('admin/pasangan/{id}', [AdminPasanganController::class, 'show'])->name('pasangan.show');
    Route::get('admin/pasangan/{id}/edit', [AdminPasanganController::class, 'edit'])->name('pasangan.edit');
    Route::post('admin/pasangan/{id}/update', [AdminPasanganController::class, 'update'])->name('pasangan.update');

    // Kelola Silsilah
    Route::get('admin/silsilah/{id}', [AdminSilsilahController::class, 'index'])->name('silsilah.index');
    Route::get('admin/silsilah/{id}/edit', [AdminSilsilahController::class, 'edit'])->name('silsilah.edit');
    Route::post('admin/silsilah/{id}/update', [AdminSilsilahController::class, 'update'])->name('silsilah.update');
});

Route::middleware(['auth', 'warga'])->group(function () {
    // Profil Warga
    Route::get('warga/profil', [WargaProfilController::class, 'index'])->name('profil.index');
    Route::get('warga/profil/edit/{id}', [WargaProfilController::class, 'edit'])->name('profil.edit');
    Route::post('warga/profil/update/{id}', [WargaProfilController::class, 'update'])->name('profil.update');

    // Anak Warga
    Route::get('warga/anak', [WargaAnakController::class, 'index'])->name('anak.index');
    Route::get('warga/anak/create', [WargaAnakController::class, 'create'])->name('anak.create');
    Route::post('warga/anak/store', [WargaAnakController::class, 'store'])->name('anak.store');
    Route::get('warga/anak/{id}', [WargaAnakController::class, 'show'])->name('anak.show');
    Route::get('warga/anak/{id}/edit', [WargaAnakController::class, 'edit'])->name('anak.edit');
    Route::post('warga/anak/{id}/update', [WargaAnakController::class, 'update'])->name('anak.update');

    // Silsilah Warga
    Route::get('warga/silsilah/{id}', [WargaSilsilahController::class, 'index'])->name('silsilahwarga.index');
});