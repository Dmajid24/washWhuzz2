<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\productController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/homePage', function () {
    return view('homePage');
});
Route::get('/product', function () {
    return view('product');
});

Route::get('/login', [authController::class, 'login']);

Route::get('/register', [authController::class, 'register']);

Route::get('/getproducts', [productController::class, 'getProducts']);

Route::post('/insertUser', [authController::class, 'insertUser']);

Route::post('/checklogin', [authController::class, 'checklogin']);

