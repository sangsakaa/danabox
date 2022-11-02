<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KordesController;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\PenyetorController;
use App\Http\Controllers\SetorController;
use App\Http\Controllers\SuratKeluarController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/buttons/text', function () {
    return view('buttons-showcase.text');
})->middleware(['auth'])->name('buttons.text');

Route::get('/buttons/icon', function () {
    return view('buttons-showcase.icon');
})->middleware(['auth'])->name('buttons.icon');

Route::get('/buttons/text-icon', function () {
    return view('buttons-showcase.text-icon');
})->middleware(['auth'])->name('buttons.text-icon');

Route::resource('dashboard', DashboardController::class)->middleware(['auth', 'verified']);
Route::get('suratkeluar', [SuratKeluarController::class, 'index'])->middleware('auth')->name('surat_keluar');
Route::get('suratkeluar/{suratkeluar}', [SuratKeluarController::class, 'show'])->middleware('auth')->name('surat_keluar');
Route::post('suratkeluar', [SuratKeluarController::class, 'store'])->middleware('auth')->name('surat_keluar');
Route::delete('suratkeluar/{suratkeluar}', [SuratKeluarController::class, 'destroy'])->middleware('auth');
require __DIR__ . '/auth.php';