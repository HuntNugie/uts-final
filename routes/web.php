<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\TransaksiController;

Route::get('/', function () {
    return redirect()->route("login");
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('barang',BarangController::class);
Route::resource('transaksi',TransaksiController::class);
Route::resource("mahasiswa",MahasiswaController::class);
Route::resource("mobil",MobilController::class);
Route::resource("rental",RentalController::class);
Route::resource("dokter",DokterController::class);
Route::resource("booking",BookingController::class);
