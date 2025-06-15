<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/homePage', function () {
    return view('homePage');
})->name('home'); 

Route::get('/order/{step?}', function ($step = 1) {
    if (!in_array($step, [1, 2, 3, 4])) {
        abort(404);
    }
    return view('order', ['step' => $step]);
})->name('order');

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::get('/register', [authController::class, 'register']);

Route::post('/insertUser', [authController::class, 'insertUser']);

Route::post('/checklogin', [authController::class, 'checklogin']);
