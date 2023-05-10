<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogClientController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MainClientController;
use App\Http\Controllers\MenuClientController;
use App\Http\Controllers\ProductClientController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;




Route::get('/', [MainClientController::class, 'index'])->name('main-client');

Route::post('/services/load-product', [MainClientController::class, 'loadProduct']);
Route::get('/bai-viet/{id}-{slug}.html', [BlogClientController::class, 'show']);
Route::get('/bai-viet.html', [BlogClientController::class, 'index']);

Route::get('danh-muc/{id}-{slug}.html', [MenuClientController::class, 'index']);
Route::get('san-pham/{id}-{slug}.html', [ProductClientController::class, 'index']);

Route::post('add-cart', [CartController::class, 'index']);
Route::get('carts', [CartController::class, 'show']);
Route::post('update-cart', [CartController::class, 'update']);
Route::get('carts/delete/{id}', [CartController::class, 'destroy']);

Route::middleware('auth')->group(function () {
    Route::post('carts', [CartController::class, 'addCart']);
});



// authentication
Route::get('/register', [AuthController::class, 'showformregister'])->name('show-form-register');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'showformlogin'])->name('show-form-login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
//google login
Route::get('/login/google', [AuthController::class, 'getGoogleLogin'])->name('google.login');
Route::get('/login/google/callback', [AuthController::class, 'getGoogleCallback'])->name('google.callback');
// search only product
Route::get('/san-pham.html', [MainClientController::class, 'search']);

Route::get('/ve-chung-toi.html', [MainClientController::class, 'about_us']);
