<?php


use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/


Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'auth:admin'],function (){
        Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
});


Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'guest:admin'],function (){
    Route::get('/',[LoginController::class,'index'])->name('admin.index');
    Route::post('login',[LoginController::class,'login'])->name('admin.login');
});
