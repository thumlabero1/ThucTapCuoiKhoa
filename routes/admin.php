<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\CategoryBlogController;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\EmployeesController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;

Route::get('/users/login', [LoginController::class, 'index'])->name('admin.login');
Route::post('/users/login/store', [LoginController::class, 'store'])->name('admin.login.store');
Route::middleware('auth:admin')->group(function () {
    Route::get('/', [MainController::class, 'index'])->name('dashboard');
    Route::get('main', [MainController::class, 'index']);

    #Menu
    Route::prefix('menus')->group(function () {
        Route::get('add', [MenuController::class, 'create']);
        Route::post('store', [MenuController::class, 'store']);
        Route::get('list', [MenuController::class, 'index']);
        Route::get('edit/{menu}', [MenuController::class, 'show']);
        Route::post('edit/{menu}', [MenuController::class, 'update']);
        Route::DELETE('destroy', [MenuController::class, 'destroy']);
    });
    #Menu
    Route::prefix('category-blog')->group(function () {
        Route::get('add', [CategoryBlogController::class, 'create']);
        Route::post('store', [CategoryBlogController::class, 'store']);
        Route::get('list', [CategoryBlogController::class, 'index']);
        Route::get('edit/{menu}', [CategoryBlogController::class, 'show']);
        Route::post('edit/{menu}', [CategoryBlogController::class, 'update']);
        Route::DELETE('destroy', [CategoryBlogController::class, 'destroy']);
    });
    #Menu
    Route::prefix('blogs')->group(function () {
        Route::get('add', [BlogController::class, 'create']);
        Route::post('store', [BlogController::class, 'store']);
        Route::get('list', [BlogController::class, 'index']);
        Route::get('edit/{blog}', [BlogController::class, 'show']);
        Route::post('edit/{blog}', [BlogController::class, 'update']);
        Route::DELETE('destroy', [BlogController::class, 'destroy']);
    });

    #Product
    Route::prefix('products')->group(function () {
        Route::get('add', [ProductController::class, 'create']);
        Route::post('store', [ProductController::class, 'store']);
        Route::get('list', [ProductController::class, 'index']);
        Route::get('edit/{product}', [ProductController::class, 'show']);
        Route::post('edit/{product}', [ProductController::class, 'update']);
        Route::DELETE('destroy', [ProductController::class, 'destroy']);

        #excel
        Route::post('/inputexcel', [ProductController::class, 'postNhap'])->name('sanpham.nhap');
        Route::get('/outputexcel', [ProductController::class, 'getXuat'])->name('sanpham.xuat');
    });

    #Slider
    Route::prefix('sliders')->group(function () {
        Route::get('add', [SliderController::class, 'create']);
        Route::post('store', [SliderController::class, 'store']);
        Route::get('list', [SliderController::class, 'index']);
        Route::get('edit/{slider}', [SliderController::class, 'show']);
        Route::post('edit/{slider}', [SliderController::class, 'update']);
        Route::DELETE('destroy', [SliderController::class, 'destroy']);
    });
    Route::post('upload/services', [UploadController::class, 'store']);
    Route::post('/thongke', [MainController::class, 'thongke']);

    #Cart
    Route::prefix('orders')->group(function () {

        Route::get('list', [CartController::class, 'index']);
        Route::get('view/{cart}', [CartController::class, 'view']);
        Route::DELETE('destroy', [CartController::class, 'destroy']);
        Route::get('/confirm/{id}', [CartController::class, 'confirm']);
        Route::get('/create-pdf-file/{cart}', [CartController::class, 'outputpdf'])->name('outputexcel');
    });
    #excel

    Route::prefix('employees')->group(function (){
        Route::get('list', [EmployeesController::class, 'index']);
        Route::get('add', [EmployeesController::class, 'create']);
        Route::post('store', [EmployeesController::class, 'store']);
        Route::get('edit/{employees}', [EmployeesController::class, 'show']);
        Route::post('edit/{employees}', [EmployeesController::class, 'update']);
        Route::DELETE('destroy', [EmployeesController::class, 'destroy']);
    });
});
