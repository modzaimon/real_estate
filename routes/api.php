<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::middleware(['auth:sanctum'])->group( function() {
    // Route::get('/get_district_by_name', [App\Http\Controllers\DistrictController::class, 'getDistrictByName'])->name('getDistrictByName');
    // Route::get('/get_district_by_zipcode', [App\Http\Controllers\DistrictController::class, 'getDistrictByZipcode'])->name('getDistrictByZipcode');
    
// });