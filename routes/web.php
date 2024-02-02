<?php

use App\Http\Controllers\WelcomeController;
//admin
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminTransaksiDetailController;
use App\Http\Controllers\AdminTransaksiController;
use App\Http\Controllers\AdminDeveloperController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminSettingController;
use App\Http\Controllers\AdminKategoriController;
use App\Http\Controllers\AdminProdukController;
//kasir
use App\Http\Controllers\KasirTransaksiDetailController;
use App\Http\Controllers\KasirTransaksiController;
use App\Http\Controllers\KasirDeveloperController;
use App\Http\Controllers\KasirSettingController;
use App\Http\Controllers\KasirProdukController;
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
Route::get('/', [AdminAuthController::class, 'index']);

Route::get('/login', [AdminAuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login/do', [AdminAuthController::class, 'doLogin'])->middleware('guest');
Route::get('/logout', [AdminAuthController::class, 'logout'])->middleware('auth');

Route::group(['middleware' => 'checkRole:admin'], function () {
    // Rute atau controller yang memerlukan hak akses admin
    Route::prefix('/admin')->middleware('auth')->group(function () {
        Route::get('/dashboard', function () {
            $data = ['content' => 'admin.dashboard.index'];
            return view('admin.layouts.wrapper', $data);
        });
        Route::resource('/transaksi', AdminTransaksiController::class);
        Route::resource('/produk', AdminProdukController::class);
        Route::resource('/kategori', AdminKategoriController::class);
        Route::resource('/user', AdminUserController::class);
        Route::resource('/developer', AdminDeveloperController::class);
        Route::get('/user/{id}/idcard', [AdminUserController::class, 'showIdCard']);
        Route::resource('/setting', AdminSettingController::class);
    });
});

Route::group(['middleware' => 'checkRole:kasir'], function () {
    Route::prefix('/kasir')->middleware('auth')->group(function () {
        Route::get('/dashboard', function () {
            $data = ['content' => 'kasir.dashboard.index'];
            return view('kasir.layouts.wrapper', $data);
        });
        Route::get('/transaksi/detail/selesai/{id}', [KasirTransaksiDetailController::class, 'done']);
        Route::get('/transaksi/detail/delete', [KasirTransaksiDetailController::class, 'delete']);
        Route::post('/transaksi/detail/create', [KasirTransaksiDetailController::class, 'create']);
        Route::resource('/transaksi/create', KasirTransaksiController::class);
        Route::resource('/transaksi', KasirTransaksiController::class);
        Route::resource('/produk', KasirProdukController::class);
        Route::resource('/setting', KasirSettingController::class);
        Route::resource('/developer', KasirDeveloperController::class);
    });
});
