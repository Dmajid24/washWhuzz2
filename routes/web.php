<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\productController;

Route::get('/login', [authController::class, 'login']);

Route::get('/register', [authController::class, 'register']);



Route::post('/insertUser', [authController::class, 'insertUser']);

Route::post('/checklogin', [authController::class, 'checklogin']);


Route::get('/', function () {
    return view('homePage');
});

Route::get('/homePage', function () {
    return view('welcome');
});
Route::get('/profile', function () {
    return view('profile');
});

Route::get('/editProfile', function () {
    return view('editProfile');
});

Route::get('/product', function () {
    return view('product');
});


Route::get('/getproducts', [productController::class, 'getProducts']);
