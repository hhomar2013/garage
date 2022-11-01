<?php

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\CustomersSubscriptionsController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ParkController;
use App\Http\Controllers\ParkRegisterController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Mail\notification_users;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes(['register'=>false ,'verify'=>true]);



Route::group(['middleware' => ['auth']], function() {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('logout',[\App\Http\Controllers\HomeController::class,'logout_users'])->name('users.logout');


    Route::get('/send_email',[ParkRegisterController::class,'send_email'])->name('send.email');

    //    Users Management
    //    roles
    Route::resource('roles', RoleController::class);
    //    users
    Route::resource('users', UserController::class);



    Route::resource('period', PeriodController::class);
    //save period
    Route::post('period_save',[PeriodController::class,'store']);



    //group
    Route::resource('group', GroupController::class);
    Route::get('show_parking/{id}',[ParkController::class,'show_parking']);
    //park
    Route::resource('park', ParkController::class);

    //Customers Management
    Route::resource('customers', CustomersController::class);
    Route::resource('customersSubscription', CustomersSubscriptionsController::class);
    Route::get('end_date',[CustomersSubscriptionsController::class,'create']);



    //parking_register
    Route::resource('parking_register',ParkRegisterController::class);
    Route::get('parking_group',[ParkRegisterController::class,'parking_group'])->name('parking_group');
    Route::get('parking_off',[ParkRegisterController::class,'parking_off']);
    Route::get('show_parking',[ParkRegisterController::class,'show_parking'])->name('show_parking');
    //Parking_Store
    Route::post('parking_register_store',[ParkRegisterController::class,'store'])->name('parking_register_store');




    //Users Reports
    Route::group(['namespace'=>'UserReport','prefix'=>'UserReport'],function (){
        Route::get('show_parking',[ParkRegisterController::class,'show'])->name('users.parking_show');
        //Search_in_park
        Route::get('Search_in_park',[ParkRegisterController::class,'Search_in_park'])->name('users.Search_in_park');
        Route::get('parking_report_result',[ParkRegisterController::class,'parking_report_result'])->name('users.parking_report_result');


    });

    //Admin Reports



});



/*
 * Admin Routs
 */
Route::get('show_shifts',[PeriodController::class,'show'])->name('admin.show_shifts');
