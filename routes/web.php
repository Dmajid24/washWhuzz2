<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/homePage', function () {
    return view('homePage');
});
Route::get('/login', [authController::class, 'login']);

Route::get('/register', [authController::class, 'register']);

Route::post('/insertUser', [authController::class, 'insertUser']);

Route::post('/checklogin', [authController::class, 'checklogin']);
