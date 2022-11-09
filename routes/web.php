<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;



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
Route::get('suratkeluar', [SuratKeluarController::class, 'index'])->middleware('auth')->name('suratkeluar');
Route::get('suratkeluar/{suratkeluar}', [SuratKeluarController::class, 'show'])->middleware('auth')->name('suratkeluar');
Route::post('suratkeluar', [SuratKeluarController::class, 'store'])->middleware('auth')->name('suratkeluar');
Route::get('/download/{file}', [SuratKeluarController::class, 'download'])->middleware('auth');
Route::delete('suratkeluar/{suratkeluar}', [SuratKeluarController::class, 'destroy'])->middleware('auth');
Route::get('suratkeluar/{suratkeluar}/edit', [SuratKeluarController::class, 'edit']);
Route::patch('suratkeluar/{suratkeluar}', [SuratKeluarController::class, 'update']);



// SURAT MASUK
Route::get('suratmasuk', [SuratMasukController::class, 'index'])->middleware('auth')->name('suratmasuk');

Route::get('suratmasuk/{suratMasuk}/edit', [SuratMasukController::class, 'edit'])->middleware('auth');

Route::post('suratmasuk', [SuratMasukController::class, 'store'])->middleware('auth')->name('suratmasuk');

Route::get('suratmasuk/{suratMasuk}', [SuratMasukController::class, 'show'])->middleware('auth');

Route::delete('suratmasuk/{suratMasuk}', [SuratMasukController::class, 'destroy'])->middleware('auth');
require __DIR__ . '/auth.php';