<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\EmployeesController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\homepage\HomepageController;

Route::get('admin/users/login', [LoginController::class, 'index'])->name(name : 'login');
Route::get('/homepage', [HomepageController::class, 'index']);
Route::post('/store', [LoginController::class, 'store']);
//qua trung gian middleware để đăng nhập
Route::middleware(['auth'])-> group(function () //xác nhận administration, khi start session sẽ gom vào 1 group
    {

            Route::prefix('admin')->group(function (){ // sử dụng hàm prefix đưa tiền tố còn lại vào route
            
            Route::get('/', [MainController::class, 'index'])->name(name : 'admin');
            Route::get('main', [MainController::class, 'index']);
            // menu
            Route::prefix('menus')->group(function (){
                Route::get('add', [MenuController::class,'create']);
                Route::post('add', [MenuController::class,'store']);
                Route::get('list', [MenuController::class,'index']);
                Route::delete('/delete/{id}', [MenuController::class,'delete'])->name('menus.delete');
                Route::get('/edit/{id}', [MenuController::class,'edit'])->name('menus.edit');
                // Route::post('/update/{id}', [MenuController::class,'update'])->name('menus.update');
                Route::post('/list/{id}', [MenuController::class,'update'])->name('menus.update');
                
            });
            Route::prefix('Employees')->group(function (){
                Route::get('list', [EmployeesController::class,'index']);
            });
            Route::prefix('Products')->group(function (){
                Route::get('list', [ProductsController::class,'index']);
            });
        });

});

