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
Route::group(['middleware' => ['auth']], function () {

    /** BackEnd Starts*/
    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/', [\App\Http\Controllers\Dashboard\DashboardController::class, 'index'])->name('dashboard.index');
    });
});


/** guest routes */
//session.cart middleware group starts

Route::get('/', [\App\Http\Controllers\Front\IndexController::class, 'index'])->name('front.index');

//session.cart middleware group ends
