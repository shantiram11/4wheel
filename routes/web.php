<?php

use App\Http\Controllers\StripePaymentController;
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

//Route::group(['middleware' => ['sessionMiddleware']], function () {

    /**protected routes**/
    Route::group(['middleware' => ['auth', 'verified']], function () {

        /** BackEnd Starts*/
        Route::group(['prefix' => 'dashboard'], function () {
            Route::get('/', [\App\Http\Controllers\Dashboard\DashboardController::class, 'index'])->name('dashboard.index');
            // Route::get('/', [\App\Http\Controllers\Dashboard\VehicleController::class, 'index'])->name('vehicle.index');
            Route::get('vehicles/{id}/travelled-locations', [\App\Http\Controllers\Dashboard\VehicleController::class, 'travelledLocations'])->name('vehicle.TravelledLocations');
            Route::resource('vehicles', \App\Http\Controllers\Dashboard\VehicleController::class);
            Route::resource('dashboard-locations', \App\Http\Controllers\Dashboard\DashboardLocationController::class);
            Route::resource('users', \App\Http\Controllers\Dashboard\UserController::class);
            Route::resource('categories', \App\Http\Controllers\Dashboard\CategoryController::class);
            Route::put('user/verify/{user}', [\App\Http\Controllers\Dashboard\UserController::class, 'userVerify'])->name('user.verify');
            Route::resource('roles', \App\Http\Controllers\Dashboard\RoleController::class);
            Route::resource('all-bookings', \App\Http\Controllers\Dashboard\BookingController::class);
            Route::resource('settings', \App\Http\Controllers\Dashboard\SettingController::class)->only(['index', 'store']);
            Route::post('/rating/{vehicle}', [\App\Http\Controllers\Dashboard\vehicleController::class, 'vehicleStar'])->name('vehicleStar');

            //profile routes start
            Route::get('profile', [\App\Http\Controllers\Dashboard\ProfileController::class, 'index'])->name('profile.index');
            Route::post('profile', [\App\Http\Controllers\Dashboard\ProfileController::class, 'store'])->name('profile.store');
            Route::get('profile/change-password', [\App\Http\Controllers\Dashboard\ProfileController::class, 'getChangePassword'])->name('profile.changePassword');
            Route::post('profile/change-password', [\App\Http\Controllers\Dashboard\ProfileController::class, 'changePassword'])->name('profile.changePassword');
            //profile routes end
        });
        /** €customer backend Starts*/
        Route::group(['prefix' => 'customer-dashboard'], function () {
            Route::get('/', [\App\Http\Controllers\Customer\CustomerDashboardController::class, 'index'])->name('customer-dashboard.index');
            // Route::get('/', [\App\Http\Controllers\Dashboard\VehicleController::class, 'index'])->name('vehicle.index');
            Route::resource('customerVehicles', \App\Http\Controllers\Customer\VehicleController::class);
            //profile routes start
            Route::get('your-profile', [\App\Http\Controllers\Customer\ProfileController::class, 'index'])->name('customer-profile.index');
            Route::post('your-profile', [\App\Http\Controllers\Customer\ProfileController::class, 'store'])->name('customer-profile.store');
            Route::get('your-profile/change-password', [\App\Http\Controllers\Customer\ProfileController::class, 'getChangePassword'])->name('customer-profile.changePassword');
            Route::post('your-profile/change-password', [\App\Http\Controllers\Customer\ProfileController::class, 'changePassword'])->name('customer-profile.changePassword');
            //profile routes end
            Route::resource('customer-bookings', \App\Http\Controllers\Customer\BookingController::class);
            Route::resource('my-vehicle-bookings', \App\Http\Controllers\Customer\MyVehicleBookingController::class);
            Route::get('your-documents', [\App\Http\Controllers\Customer\ProfileController::class, 'getDocument'])->name('getDocument');
            Route::put('booking/verify/{booking}', [\App\Http\Controllers\Customer\MyVehicleBookingController::class, 'bookingVerify'])->name('booking.verify');
            Route::delete('remove-image/{id}', [\App\Http\Controllers\Customer\VehicleController::class, 'removeImage'])->name('removeImage');
        });
        Route::post('/reviews/vehicles/{slug}', [App\Http\Controllers\Front\ReviewController::class, 'storeReview'])->name('storeReview');

        /** Checkout routes */
        Route::resource('bookings', \App\Http\Controllers\Front\BookingController::class);
        Route::post('checkout/fulfill-order', [\App\Http\Controllers\Front\CheckoutController::class, 'fulfillOrder'])->name('checkout.fulfillOrder');
        Route::post('payment/pre-payment-validation', [\App\Http\Controllers\Front\CheckoutController::class, 'prePaymentValidation'])->name('checkout.prePaymentValidation');
        Route::post('payment/stripe', [\App\Http\Controllers\Front\PaymentController::class, 'getStripePaymentIntent'])->name('stripe.payment');
        Route::post('booking', [\App\Http\Controllers\Front\BookingController::class, 'store'])->name('front.booking.store');


        Route::post('front/wishlist/{vehicle_id}', [App\Http\Controllers\Front\WishListController::class, 'toggleWishlist'])->name('front.user.toggleWishlist');
    });

    /** guest routes */

    Route::get('/', [\App\Http\Controllers\Front\IndexController::class, 'index'])->name('front.index')->middleware('sessionMiddleware');
    Route::get('/property/{slug}', [\App\Http\Controllers\Front\IndexController::class, 'show'])->name('front.detail');
;
    Route::get('/payment', function () {
        return view('front.detail.payment');
    })->name('payment');
//});
