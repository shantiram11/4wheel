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

// Route::get('/', function () {
//     return view('welcome');
// });






/**protected routes**/
Route::group(['middleware' => ['auth','verified']], function () {

    /** BackEnd Starts*/
    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/', [\App\Http\Controllers\Dashboard\DashboardController::class, 'index'])->name('dashboard.index');
        // Route::get('/', [\App\Http\Controllers\Dashboard\VehicleController::class, 'index'])->name('vehicle.index');
        Route::resource('vehicles', \App\Http\Controllers\Dashboard\VehicleController::class);
        Route::resource('users', \App\Http\Controllers\Dashboard\UserController::class);
        Route::resource('photos', \App\Http\Controllers\Dashboard\UserController::class);
        Route::resource('roles', \App\Http\Controllers\Dashboard\RoleController::class);
        Route::post('/rating/{vehicle}', [\App\Http\Controllers\Dashboard\vehicleController::class, 'vehicleStar'])->name('vehicleStar');
    });

});




/** guest routes */
//session.cart middleware group starts

Route::get('/', [\App\Http\Controllers\Front\IndexController::class, 'index'])->name('front.index');
Route::get('/property', function () {
    return view('front.detail.property');
})->name('property');
