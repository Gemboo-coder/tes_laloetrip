<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DestinasiController;
use App\Http\Controllers\PaketTripController;

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/paket-trip', [PaketTripController::class, 'index'])
    ->name('paket.paket');

Route::get('/paket-trip/{slug}', [PaketTripController::class, 'show'])
    ->name('paket.show');

Route::get('/destinasi', [DestinasiController::class, 'index'])
    ->name('destinasi.index');

Route::get('/destinasi/{slug}', [DestinasiController::class, 'show'])
    ->name('destinasi.show');

Route::get('/galeri', [GaleriController::class, 'index'])
    ->name('galeri.index');

Route::get('/review', [ReviewController::class, 'index'])
    ->name('review.index');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return redirect('/');
    })->name('dashboard');

    Route::get('/review/create', [ReviewController::class, 'create'])
        ->name('review.create');

    Route::post('/review', [ReviewController::class, 'store'])
        ->name('review.store');

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';