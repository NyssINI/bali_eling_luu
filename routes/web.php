<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\ActionSubmissionController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\EvidenceController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;

// Public
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', [PageController::class, 'dashboard'])
    ->middleware('auth')
    ->name('dashboard');

Route::get('/edukasi', [PageController::class, 'edukasi'])
    ->name('edukasi');

Route::get('/panduan', [PageController::class, 'panduan'])
    ->name('panduan');

Route::get('/artikel', [ArtikelController::class, 'index'])
    ->name('artikel.index');

Route::get('/artikel/{id}', [ArtikelController::class, 'show'])
    ->name('artikel.show');

Route::get('/tantangan', [ChallengeController::class, 'index'])
    ->name('challenges.index');

Route::get('/tantangan/{challenge:slug}', [ChallengeController::class, 'show'])
    ->name('challenges.show');

// Authentication
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->middleware('throttle:5,1');

    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

// User (auth)
Route::middleware('auth')->group(function () {
    Route::get('/aksi/buat/{challenge:slug}', [ActionSubmissionController::class, 'create'])
        ->name('aksi.create');
    Route::post('/aksi', [ActionSubmissionController::class, 'store'])
        ->name('aksi.store');

    Route::get('/riwayat', [ActionSubmissionController::class, 'index'])
        ->name('riwayat');

    Route::get('/profil', [ProfileController::class, 'edit'])
        ->name('profil.edit');
    Route::patch('/profil', [ProfileController::class, 'update'])
        ->name('profil.update');

    Route::get('/bukti/{evidence}', [EvidenceController::class, 'show'])
        ->name('bukti.show');
});

// Admin (role: admin only, cek di backend via middleware)
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', AdminDashboardController::class)->name('dashboard');
});
