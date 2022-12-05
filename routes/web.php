<?php

use App\Http\Controllers\Supplier;
use App\Http\Controllers\transBeli;
use App\Http\Controllers\transJual;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerNota;
use App\Http\Controllers\returPembelian;
use App\Http\Controllers\returPenjualan;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ControllerBarang;
use App\Http\Controllers\ControllerDashboard;
use App\Http\Controllers\ControllerPelanggan;
use App\Http\Livewire\ControllerDashboard as LivewireControllerDashboard;

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



Route::post('/login', [UserController::class, 'authenticate']);
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
// //Register page

// Route::prefix()
Route::post('/register', [UserController::class, 'Store']);
Route::get('/register', [UserController::class, 'Register'])->name('register')->middleware('auth');






// Page Barang
Route::get('/barang', [ControllerBarang::class, 'showBarang'])->name('barang')->middleware('auth');
Route::post('/barang', [ControllerBarang::class, 'simpanBarang']);

Route::get('/pelanggan', [ControllerPelanggan::class, 'showPelanggan'])->name('pelanggan')->middleware('auth');
Route::post('/pelanggan', [ControllerPelanggan::class, 'simpanPelanggan']);


Route::get('/supplier', [Supplier::class, 'showSupplier'])->name('supplier')->middleware('auth');
Route::post('/supplier', [Supplier::class, 'simpanSupplier']);


// // Page Pelanggan
// // Route::get('/pelanggan', [ControllerDaftar::class, 'pelanggan'])->name('pelanggan');
// // Route::post('/pelanggan', [ControllerDaftar::class, 'insert']);

// page transaksi
Route::get('/transaksiPenjualan',  [transJual::class, 'showTransaksi'])->name('transaksiJual')->middleware('auth');
Route::post('/transaksiPenjualan',  [transJual::class, 'showTransaksi']);

Route::get('/transaksiPembelian',  [transBeli::class, 'showTransaksi'])->name('transaksiBeli')->middleware('auth');
Route::post('/transaksiPembelian',  [transBeli::class, 'showTransaksi']);

// //page returan
Route::get('/returanPembelian',  [returPembelian::class, 'showRetur'])->name('returBeli')->middleware('auth');
Route::post('/returanPembelian',  [returPembelian::class, 'showRetur']);

Route::get('/returanPenjualan',  [returPenjualan::class, 'showRetur'])->name('returJual')->middleware('auth');
Route::post('/returanPenjualan',  [returPenjualan::class, 'showRetur']);

// //page dashboard
Route::get('/', function () {
    return view('livewire.controller-dashboard');
});

Route::get('/dashboard',  [LivewireControllerDashboard::class, 'render'])->name('dashboard')->middleware('auth');


Route::get('/pengguna',  [ControllerPengguna::class, 'showPengguna'])->name('pengguna')->middleware('auth');

Route::get('/nota',  [ControllerNota::class, 'showNota'])->name('nota')->middleware('auth');
// // Login Page
