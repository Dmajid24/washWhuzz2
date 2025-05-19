<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', [authController::class, 'login']);

Route::get('/register', [authController::class, 'register']);

Route::post('/insertUser', [authController::class, 'insertUser']);

Route::post('/checklogin', [authController::class, 'checklogin']);
Route::get('/', function () {
    return view('welcome');
});

Route::get('/homePage', function () {
    return view('homePage');
});
