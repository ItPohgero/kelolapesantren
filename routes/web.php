<?php

use App\Http\Controllers\BarcodeController;
use App\Http\Controllers\Santri\AuthController;
use App\Http\Controllers\Santri\DashboardController;
use App\Http\Controllers\User\PondokController;
use App\Http\Controllers\User\RelasiSantriController;
use App\Http\Controllers\User\SantriController;
use App\Http\Controllers\User\SearchController;
use App\Http\Controllers\User\TabunganController;
use App\Http\Controllers\User\TokoController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('main.dashboard');
})->name('dashboard');

Route::prefix('encsript')->group(function () {
    /**
     * Fitur Search
     */
    Route::prefix('search')->group(function () {
        Route::get('santri', [SearchController::class, 'santri'])->name('search.santri');
    });

    Route::view('timeline', 'main.timeline')->name('timeline');
    /**
     * Fitur santri
     */
    Route::resource('santri', SantriController::class);
    /**
     * Fitur tabungan
     */
    Route::resource('tabungan', TabunganController::class);
    Route::prefix('g-tabungan')->group(function () {
        Route::get('invoice/{invoice}',     [TabunganController::class, 'invoice'])->name('tabungan.invoice');
        Route::get('download/{invoice}',    [TabunganController::class, 'download'])->name('tabungan.download');
        #User tabungan
        Route::get('user',                  [TabunganController::class, 'user'])->name('tabungan.user');
        Route::post('add',                  [TabunganController::class, 'add'])->name('tabungan.add');
        Route::patch('up/{id}',             [TabunganController::class, 'up'])->name('tabungan.up');
    });

    /**
     * Fitur Toko
     */

    Route::resource('toko', TokoController::class);
    Route::prefix('g-toko')->group(function () {
        Route::get('report/{option}/{hash}',    [TokoController::class, 'option'])->name('toko.report.option');
        Route::post('report/option/{hash}',     [TokoController::class, 'choose'])->name('toko.report.choose');
    });

    /**
     * Fitur Pondok
     */
    Route::resource('pondok', PondokController::class);
    Route::prefix('g-pondok')->group(function () {
        Route::get('invoke/{id}', PondokController::class)->name('pondok.invoke');
    });
    /**
     * Fitur Relasi
     */
    Route::prefix('relasi')->group(function () {
        Route::get('index',                 [RelasiSantriController::class, 'index'])->name('relasi.index');
        Route::get('joined/{id}',           [RelasiSantriController::class, 'joined'])->name('relasi.joined');
        Route::post('upload',               [RelasiSantriController::class, 'upload'])->name('relasi.upload');
        Route::post('store',                [RelasiSantriController::class, 'store'])->name('relasi.store');
        Route::get('remove/{santri_id}/{relasi_id}', [RelasiSantriController::class, 'remove'])->name('relasi.remove');
        Route::get('anggota/{slug}',        [RelasiSantriController::class, 'anggota'])->name('relasi.anggota');
        Route::patch('update/{slug}',       [RelasiSantriController::class, 'update'])->name('relasi.update');
    });
});

/**
 * Authentivikasi santri login
 */
Route::view('alpine', 'santri.auth.login')->name('santri.login');
Route::post('alpine',               [AuthController::class, 'chek'])->name('santri.chek.login');
# Logout umum
Route::get('logout',                [AuthController::class, 'logout'])->name('logout');

/**
 * Santri mode
 */
Route::prefix('santri')->middleware('alpine')->group(function () {
    Route::get('dashboad',                  DashboardController::class)->name('santri.dashboard');
    Route::get('report',                    [DashboardController::class, 'report'])->name('santri.report');
    Route::get('profile',                   [DashboardController::class, 'profile'])->name('santri.profile');
    Route::patch('update-password',           [DashboardController::class, 'update_password'])->name('santri.update_password');
    #Coming soon
    Route::view('cooming-soon', 'santri.coming-soon')->name('santri.coming.soon');
});

/**
 * Fitur barcode
 */
Route::prefix('barcode')->group(function () {
    Route::get('read/{code}/{hash}',        [BarcodeController::class, 'read'])->name('barcode.read');
    # Cek auth toko
    Route::post('cek/payment/{code}',       [BarcodeController::class, 'cek_payment'])->name('barcode.cek.payment');
    ROute::prefix('toko')->middleware('toko')->group(function(){
        # Payment Toko
        Route::get('payment/{pin}/{code}',      [BarcodeController::class, 'payment'])->name('barcode.payment');
        Route::post('action/{pin}/{code}',      [BarcodeController::class, 'action'])->name('barcode.action.payment');
        Route::get('invoice/{invoice}',         [BarcodeController::class, 'invoice'])->name('barcode.invoice');
        Route::get('pdf-toko/{invoice}',        [BarcodeController::class, 'toko_pdf'])->name('barcode.toko_pdf');
    });
    # Cek auth tabugan
    Route::post('cek/tabungan/{code}',          [BarcodeController::class, 'cek_tabungan'])->name('barcode.cek.tabungan');
    ROute::prefix('tabungan')->middleware('tabungan')->group(function(){
        # Tabungan
        Route::get('take-save/{code}',          [BarcodeController::class, 'take_save'])->name('barcode.take.save');
        Route::post('store-take-save',          [BarcodeController::class, 'store'])->name('barcode.store');
        Route::get('pdf-tabungan/{invoice}',             [BarcodeController::class, 'tabungan_pdf'])->name('barcode.tabungan_pdf');
    });
});
