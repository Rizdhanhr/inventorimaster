<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\SuratJalanController;
use App\Http\Controllers\DataStokController;
use App\Http\Controllers\MutasiBarangController;
use App\Http\Controllers\StokMenipisController;
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

// Route::get('/', function () {
//     return view('login');
// });

Route::get('/',[LoginController::class,'index']);
Route::get('/register',[RegisterController::class,'index']);

Route::resource('/dashboard', DashboardController::class);
Route::resource('/kategori', KategoriController::class);
Route::resource('/brand', BrandController::class);
Route::resource('/satuan', SatuanController::class);
Route::resource('/barang', BarangController::class);
Route::resource('/supplier', SupplierController::class);
Route::resource('/pelanggan', PelangganController::Class);
Route::resource('/barangmasuk', BarangMasukController::Class);
Route::get('/getbarang/{id}', [BarangMasukController::class,'getbarang']);
Route::resource('/barangkeluar', BarangKeluarController::class);
Route::get('/getbarangout/{id}', [BarangKeluarController::class,'getbarangout']);
Route::post('/barangmasukupdate',[BarangMasukController::class,'barangmasuk']);
Route::post('/barangkeluarupdate',[BarangKeluarController::class,'barangkeluar']);
Route::resource('/suratjalan', SuratJalanController::class);
Route::resource('/datastok', DataStokController::class);
Route::get('/caristok', [DataStokController::class,'cari']);
Route::get('/getpelanggan/{id}', [SuratJalanController::class,'getpelanggan']);
Route::resource('/datamutasi', MutasiBarangController::class);
Route::get('/carimutasi',[MutasiBarangController::class,'getmutasi']);
Route::resource('/stokmenipis', StokMenipisController::class);
Route::get('/suratjalancetak/{no_trx}',[SuratJalanController::class,'cetak']);
