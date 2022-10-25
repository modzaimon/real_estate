<?php

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



Auth::routes();

Route::post('login', [App\Http\Controllers\LoginController::class, 'todoLogin'])->name('login');

Route::middleware(['auth'])->group( function() {
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('profile');
    Route::get('/editProfile', [App\Http\Controllers\UserController::class, 'editProfile'])->name('editProfile');
    
    Route::resource('brand',        App\Http\Controllers\BrandController::class);
    Route::resource('developer',    App\Http\Controllers\DeveloperController::class);
    Route::resource('project',      App\Http\Controllers\ProjectController::class);
    Route::resource('estate',       App\Http\Controllers\EstateController::class);
    Route::resource('seller',       App\Http\Controllers\SellerController::class);
    Route::resource('customer',     App\Http\Controllers\CustomerController::class);
    Route::resource('bank',         App\Http\Controllers\BankController::class);
    Route::resource('directsale',   App\Http\Controllers\DirectsaleController::class);
    Route::resource('sale',         App\Http\Controllers\SaleController::class);

    Route::get('/get_district_by_name', [App\Http\Controllers\DistrictController::class,'getDistrictByName'])->name('getDistrictByName');
    Route::get('/get_customer_by_name', [App\Http\Controllers\CustomerController::class,'getCustomerByName'])->name('getCustomerByName');
    Route::get('/get_estate_by_name', [App\Http\Controllers\EstateController::class,'getEstateByName'])->name('getEstateByName');
});

//---example---
// Route::post('login', 'Auth\LoginController@login');
