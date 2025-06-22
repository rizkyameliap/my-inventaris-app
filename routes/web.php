<?php
// File: routes/web.php

use Illuminate\Support\Facades\Route;
use App\Livewire\Barang; // Perbaikan: use App\Livewire
use App\Livewire\Lokasi; // Perbaikan: use App\Livewire
use App\Livewire\Laporan; // Perbaikan: use App\Livewire
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;

// Rute Autentikasi (dikelola oleh Laravel Breeze)
require __DIR__.'/auth.php';

// Grup rute yang membutuhkan autentikasi
Route::middleware(['auth'])->group(function () {
    // Rute Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Rute CRUD Barang
    Route::get('/barang', Barang\Index::class)->name('barang.index');
    Route::get('/barang/create', Barang\Create::class)->name('barang.create');
    Route::get('/barang/{barang}/edit', Barang\Edit::class)->name('barang.edit');
    Route::get('/barang/{barang}/mutasi', Barang\Mutasi::class)->name('barang.mutasi');
    // Catatan: Komponen Delete dihandle melalui event Livewire dari Barang\Index

    // Rute CRUD Lokasi
    Route::get('/lokasi', Lokasi\Index::class)->name('lokasi.index');
    Route::get('/lokasi/create', Lokasi\Create::class)->name('lokasi.create');
    Route::get('/lokasi/{lokasi}/edit', Lokasi\Edit::class)->name('lokasi.edit'); // Perbaikan: ganti -> jadi .

    // Rute Laporan
    Route::get('/laporan/barang-aktif', Laporan\BarangAktif::class)->name('laporan.barang-aktif');
    Route::get('/laporan/barang-per-lokasi', Laporan\BarangPerLokasi::class)->name('laporan.barang-per-lokasi');

    // Rute Home (redirect ke dashboard setelah login)
    Route::get('/', function () {
        return redirect()->route('dashboard');
    });

    Route::get('/home', function () {
    return redirect()->route('dashboard');
    })->name('home');

    Route::resource('kategori', KategoriController::class);
    // Rute untuk mengelola kategori
    Route::get('/kategori/{id}', [KategoriController::class, 'show'])->name('kategori.show');
    
});