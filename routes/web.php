<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\KuponController;
use App\Http\Controllers\Admin\PaketController;
use App\Http\Controllers\Admin\PesanController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\Pelanggan\ProfilController;
use App\Http\Controllers\Karyawan\PelangganController;
use App\Http\Controllers\Pelanggan\NotificationController;
use App\Http\Controllers\Pelanggan\PelangganPesanController;
use App\Http\Controllers\Pelanggan\PelangganTransaksiController;
use App\Http\Controllers\Karyawan\TransaksiController as KaryawanTransaksiController;

Auth::routes();

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('pakets', [PaketController::class, 'index'])->name('pakets.index');
    Route::get('pakets/create', [PaketController::class, 'create'])->name('pakets.create');
    Route::post('pakets', [PaketController::class, 'store'])->name('pakets.store');
    Route::get('pakets/{paket}/edit', [PaketController::class, 'edit'])->name('pakets.edit');
    Route::put('pakets/{paket}', [PaketController::class, 'update'])->name('pakets.update');
    Route::delete('pakets/{paket}', [PaketController::class, 'destroy'])->name('pakets.destroy');
    Route::post('pakets/{paket}/activate', [PaketController::class, 'activate'])->name('pakets.activate');
    Route::post('pakets/{paket}/deactivate', [PaketController::class, 'deactivate'])->name('pakets.deactivate');
    Route::get('kupons', [KuponController::class, 'index'])->name('kupons.index');
    Route::get('kupons/create', [KuponController::class, 'create'])->name('kupons.create');
    Route::post('kupons', [KuponController::class, 'store'])->name('kupons.store');
    Route::get('kupons/{kupon}/edit', [KuponController::class, 'edit'])->name('kupons.edit');
    Route::put('kupons/{kupon}', [KuponController::class, 'update'])->name('kupons.update');
    Route::delete('kupons/{kupon}', [KuponController::class, 'destroy'])->name('kupons.destroy');
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('users', [UserController::class, 'store'])->name('users.store');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::post('users/{user}/activate', [UserController::class, 'activate'])->name('users.activate');
    Route::post('users/{user}/deactivate', [UserController::class, 'deactivate'])->name('users.deactivate');
    Route::get('users/profile', [UserController::class, 'profile'])->name('users.profile');
    Route::get('transaksis', [TransaksiController::class, 'index'])->name('transaksis.index');
    Route::get('transaksis/create', [TransaksiController::class, 'create'])->name('transaksis.create');
    Route::post('transaksis', [TransaksiController::class, 'store'])->name('transaksis.store');
    Route::get('transaksis/{transaksi}/edit', [TransaksiController::class, 'edit'])->name('transaksis.edit');
    Route::put('transaksis/{transaksi}', [TransaksiController::class, 'update'])->name('transaksis.update');
    Route::delete('transaksis/{transaksi}', [TransaksiController::class, 'destroy'])->name('transaksis.destroy');
    Route::post('transaksi/{id}/update-status/{status}', [TransaksiController::class, 'updateStatus'])->name('transaksi.updateStatus');
    Route::get('home', [HomeController::class, 'adminHome'])->name('home');
    Route::get('karyawan', [UserController::class, 'listKaryawan'])->name('karyawan.index');
    Route::get('pelanggan', [UserController::class, 'listPelanggan'])->name('pelanggan.index');
    Route::get('/pelanggan/search', [PelangganTransaksiController::class, 'search'])->name('pelanggan.search');
    Route::get('pesans', [PesanController::class, 'index'])->name('pesan.index');
    Route::get('/pesans/{pesan}', [PesanController::class, 'show'])->name('pesan.show');
    Route::get('transaksis/laporan', [TransaksiController::class, 'laporanForm'])->name('transaksi.laporanForm');
    Route::get('transaksis/laporanpelanggan', [TransaksiController::class, 'laporanpelanggan'])->name('transaksi.laporanpelanggan');
    Route::post('transaksis/laporan', [TransaksiController::class, 'generateLaporan'])->name('transaksi.generateLaporan');
    Route::post('pelanggan/store', [UserController::class, 'storePelanggan'])->name('pelanggan.store');
    Route::get('transaksi/print/{id}', [TransaksiController::class, 'print'])->name('transaksi.print');
    Route::get('users/generate-pdf', [UserController::class, 'generatePdf'])->name('users.generatePdf');
    Route::get('laporan/kupon', [LaporanController::class, 'index'])->name('laporan.kupon');
    Route::get('laporan/kupon/pdf', [LaporanController::class, 'generatePdf'])->name('laporan.kupon.pdf');
});

Route::middleware(['auth', 'role:karyawan'])->prefix('karyawan')->name('karyawan.')->group(function () {
    Route::get('transaksi', [KaryawanTransaksiController::class, 'index'])->name('transaksi.index');
    Route::get('transaksi/create', [KaryawanTransaksiController::class, 'create'])->name('transaksi.create');
    Route::post('transaksi', [KaryawanTransaksiController::class, 'store'])->name('transaksi.store');
    Route::delete('transaksi/{id}', [KaryawanTransaksiController::class, 'destroy'])->name('transaksi.destroy');
    Route::post('transaksi/{id}/update-status/{status}', [KaryawanTransaksiController::class, 'updateStatus'])->name('transaksi.updateStatus');
    Route::get('/home', [HomeController::class, 'karyawanHome'])->name('home');
    Route::get('/profile', [KaryawanTransaksiController::class, 'profile'])->name('profile');
    Route::get('/kupon', [KaryawanTransaksiController::class, 'kupon'])->name('kupon');
    Route::post('users/store', [UserController::class, 'storePelanggan'])->name('pelanggan.store');
    Route::get('transaksi/print/{id}', [KaryawanTransaksiController::class, 'print'])->name('transaksi.print');
});

Route::middleware(['auth', 'role:pelanggan'])->group(function () {
    Route::get('pelanggan/home', [HomeController::class, 'pelangganHome'])->name('pelanggan.home');
    Route::get('/pelanggan/index', [PelangganTransaksiController::class, 'index'])->name('pelanggan');
    Route::get('/pelanggan/profile', [PelangganTransaksiController::class, 'profile'])->name('pelanggan.profile');
    Route::get('/pelanggan/invoice/{id}', [PelangganTransaksiController::class, 'invoice'])->name('pelanggan.invoice');
    Route::post('/notifications/markAsRead', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');
    Route::get('/pesan/create', [PelangganPesanController::class, 'create'])->name('pelanggan.pesan.create');
    Route::post('/pesan', [PelangganPesanController::class, 'store'])->name('pelanggan.pesan.store');
    Route::get('pesan', [PelangganPesanController::class, 'index'])->name('pesan.index');
    Route::get('/profil/edit', [ProfilController::class, 'edit'])->name('profil.edit');
    Route::post('/profil/update', [ProfilController::class, 'update'])->name('profil.update');

});


