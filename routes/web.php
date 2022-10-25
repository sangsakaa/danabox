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

Route::resource('nasabah', NasabahController::class)->middleware(['auth']);
Route::resource('setor', SetorController::class)->middleware(['auth']);
Route::resource('penyetor', PenyetorController::class)->middleware(['auth']);
Route::resource('dashboard', DashboardController::class)->middleware(['auth','verified']);
Route::resource('kordes', KordesController::class)->middleware(['auth','verified'])->parameters(['kordes'=>'kordes']);


Route::get('surat_keluar', [SuratKeluarController::class, 'index'])->middleware('auth')->name('surat_keluar');
require __DIR__ . '/auth.php';