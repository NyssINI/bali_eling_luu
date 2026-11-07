
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\PageController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', [PageController::class, 'dashboard'])
    ->name('dashboard');

Route::get('/edukasi', [PageController::class, 'edukasi'])
    ->name('edukasi');

Route::get('/panduan', [PageController::class, 'panduan'])
    ->name('panduan');

Route::get('/artikel', [ArtikelController::class, 'index'])
    ->name('artikel.index');

Route::get('/artikel/{id}', [ArtikelController::class, 'show'])
    ->name('artikel.show');
