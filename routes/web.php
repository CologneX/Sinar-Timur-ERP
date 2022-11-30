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

// Page Barang
Route::get('/', [ControllerBarang::class, 'showBarang'])->name('barang');
Route::post('/', [ControllerBarang::class, 'simpanBarang']);

Route::get('/pelanggan', [ControllerPelanggan::class, 'showPelanggan'])->name('pelanggan');
Route::post('/pelanggan', [ControllerPelanggan::class, 'simpanPelanggan']);


Route::get('/supplier', [Supplier::class, 'showSupplier'])->name('supplier');
Route::post('/supplier', [Supplier::class, 'simpanSupplier']);


// // Page Pelanggan
// // Route::get('/pelanggan', [ControllerDaftar::class, 'pelanggan'])->name('pelanggan');
// // Route::post('/pelanggan', [ControllerDaftar::class, 'insert']);

// page transaksi
Route::get('/transaksiPenjualan',  [transJual::class, 'showTransaksi'])->name('transaksiJual');
Route::post('/transaksiPenjualan',  [transJual::class, 'showTransaksi']);

Route::get('/transaksiPembelian',  [transBeli::class, 'showTransaksi'])->name('transaksiBeli');
Route::post('/transaksiPembelian',  [transBeli::class, 'showTransaksi']);

// //page returan
Route::get('/returanPembelian',  [returPembelian::class, 'showRetur'])->name('returBeli');
Route::post('/returanPembelian',  [returPembelian::class, 'showRetur']);

Route::get('/returanPenjualan',  [returPenjualan::class, 'showRetur'])->name('returJual');
Route::post('/returanPenjualan',  [returPenjualan::class, 'showRetur']);

// //page dashboard
Route::get('/dashboard',  [ControllerDashboard::class, 'showDashboard'])->name('dashboard');


Route::get('/pengguna',  [ControllerPengguna::class, 'showPengguna'])->name('pengguna');

Route::get('/nota',  [ControllerNota::class, 'showNota'])->name('nota');
// // Login Page

//Register page
Route::get('/register', [UserController::class, 'Register'])->name('register');
Route::post('/register', [UserController::class, 'Store']);

//Login page
Route::get('/login', [UserController::class, 'Login']);
Route::post('/login', [UserController::class, 'LoginUser']);
