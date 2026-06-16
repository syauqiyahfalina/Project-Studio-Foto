<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// --- Halaman Publik (Landing Page) ---
Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/paket', [FrontendController::class, 'paket'])->name('paket.index');
Route::get('/galeri', [FrontendController::class, 'galeri'])->name('galeri.index');

// --- Halaman Blog ---
Route::get('/blog', [PostController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [PostController::class, 'show'])->name('blog.show');

// --- Halaman User & Booking (Wajib Login) ---
Route::middleware(['auth'])->group(function () {
    
    // Redirect setelah login
    Route::get('/dashboard', function () {
        return auth()->user()->is_admin ? redirect('/admin') : redirect('/my-reservations');
    })->name('dashboard');

    // Booking & Riwayat
    Route::get('/booking', [BookingController::class, 'create'])->name('booking.create');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
    Route::get('/my-reservations', [BookingController::class, 'index'])->name('booking.index');
    Route::get('/my-reservations/{id}', [BookingController::class, 'show'])->name('booking.show');
    Route::post('/my-reservations/{id}/pay', [BookingController::class, 'pay'])->name('booking.pay');

    // Profile (Bawaan Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth Routes (Login/Register/Logout)
require __DIR__ . '/auth.php';