<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;

// Authentication Routes
Route::get('/', function () {
    return redirect()->route('login');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/checklogin', 'checklogin');
    Route::get('/register', 'register')->name('register');
    Route::post('/insertUser', 'insertUser');
});

// Authenticated Routes
Route::middleware(['auth'])->group(function () {
    // Home
    Route::get('/homePage', function () {
        return view('homePage');
    })->name('home');

    // Profile Routes
    Route::prefix('profile')->controller(ProfileController::class)->group(function () {
        Route::get('/', 'show')->name('profile');
        Route::get('/edit', 'edit')->name('profile.edit');
        Route::post('/update', 'update')->name('profile.update');
    });

    // Transaction Routes
    Route::prefix('transactions')->controller(TransactionController::class)->group(function () {
        Route::post('/checkout', 'store')->name('transaction.store');
        Route::get('/history', 'history')->name('transaction.history');
        Route::post('/add-to-cart/{idProduct}', 'addToCart');
    });

    // Order Process
    Route::prefix('order')->controller(TransactionController::class)->group(function () {
        Route::get('/{step?}', 'showOrderStep')
            ->where('step', '[1-4]')
            ->name('order');
        Route::post('/{step}/process', 'processStep')
            ->name('order.process');
    });

    // Logout
    Route::get('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login');
    })->name('logout');
});

// Product Routes
// routes/web.php
Route::get('/product', function () {
    return view('product');
})->name('product');