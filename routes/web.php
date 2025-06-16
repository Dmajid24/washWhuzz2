<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\TransactionController;

Route::post('/insertUser', [authController::class, 'insertUser']);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/checklogin', [AuthController::class, 'checklogin']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/insertUser', [AuthController::class, 'insertUser']);

Route::middleware(['auth'])->group(function () {
    Route::get('/homePage', function () {
        return view('welcome');
    })->name('home');

    Route::get('/profile', fn() => view('profile'));
    Route::get('/editProfile', fn() => view('editProfile'))->name('editProfile');
    Route::post('/profile/update', [profileController::class, 'update'])->name('profile.update');
    Route::post('/checkout', [TransactionController::class, 'store'])->name('transaction.store');

    Route::get('/order/{step?}', function ($step = 1) {
        if (!in_array($step, [1, 2, 3, 4])) {
            abort(404);
        }
        return view('order', ['step' => $step]);
    })->name('order');

    Route::get('/transactions/history', [TransactionController::class, 'history'])->name('transaction.history');

    Route::get('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    });
    Route::post('/add-to-cart/{idProduct}', [TransactionController::class, 'addToCart']);
    Route::get('/order', [TransactionController::class, 'showCart'])->name('order');
});

Route::get('/product', fn() => view('product'))->name('product');
Route::get('/getproducts', [ProductController::class, 'getProducts']);
