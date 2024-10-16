<?php

use App\Http\Controllers\Api\v1\Client\{AddressController,
    CartController,
    CategoryController,
    FavouriteController,
    OrderController,
    ProductAdditionController,
    ProductController,
    VendorCategoryController,
    VendorController};
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\v1\Client\AuthClientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\Driver\{
    AuthDriverController,

};


Route::group(['prefix' => '/auth'], function () {
    //Route Register
    Route::post('/register-client', [AuthClientController::class, "register"]);
    Route::post('/login', [AuthClientController::class, "login"]);

    // Check the Phone for user.
    Route::post('/check-phone', [AuthClientController::class, "checkPhone"]);
    //Check Code
    Route::post('reset/check_code', [AuthClientController::class, "checkCode"]);
    //Change OR Reset Password.
    Route::post('reset/reset_password', [AuthClientController::class, "resetPassword"]);

    //Route cities
    Route::get('/cities', [AuthClientController::class, "cities"]);

    // Logout user.
    Route::post("/logout", [AuthClientController::class, "logout"])->name("logout");

});

Route::group(['middleware' => 'auth:api'], function () {
    //verify phone
    Route::post('/verify-phone', [AuthClientController::class, "verifyPhone"]);
    //Route Profile
    Route::get('/profile', [AuthClientController::class, "profile"]);
    Route::post('/profile', [AuthClientController::class, "updateProfile"]);

    //Route Change Password
    Route::post('/change-password', [AuthClientController::class, "changePassword"]);

    Route::post('/change-notification', [AuthClientController::class, "changeNotification"]);

    //Route Logout
    Route::post('/logout', [AuthClientController::class, "logout"]);

    //Route delete account
    Route::post('/delete-account', [AuthClientController::class, "deleteAccount"]);
    Route::resource('address', AddressController::class);

    //Route Vendor Category
    Route::get('/vendor-categories', [VendorCategoryController::class, "index"]);
    Route::get('/vendor-categories/{id}', [VendorCategoryController::class, "show"]);


    //Route Vendor
    Route::get('/vendors', [VendorController::class, "index"]);
    Route::get('/vendors/{id}', [VendorController::class, "show"]);

    //Route categories
    Route::get('/categories/', [CategoryController::class, "index"]);
    Route::get('/categories/{id}', [CategoryController::class, "show"]);

    //Route Product
    Route::get('/products', [ProductController::class, "index"]);
    Route::get('/products/{id}', [ProductController::class, "show"]);
    Route::get('/products/addition/{id}', [ProductAdditionController::class, "show"]);

    //Route carts
    Route::get('/cart/index', [CartController::class, "index"]);
    Route::post('/cart/store', [CartController::class, "store"]);
    Route::post('/cart/update/quantity', [CartController::class, "controlItem"]);
    Route::post('/cart/submit/coupon', [CartController::class, "submit_coupon"]);
    Route::post('/order/store', [OrderController::class, "store"]);
    Route::get('/order', [OrderController::class, "index"]);
    Route::get('order/detail/{id}', [OrderController::class, "orderDetail"]);
    Route::post('/order/rating', [OrderController::class, "rating"]);
    Route::post('/order/cancel', [OrderController::class, "cancel_order"]);

    Route::resource('notification', NotificationController::class)->only(['index','update','destroy']);

    Route::get('favourite', [FavouriteController::class, 'favourites']);
    Route::post('favourite/store', [FavouriteController::class, 'add_to_fav']);


});

// driver routes

Route::group(['prefix' => '/driver/auth'], function () {
    //Route Register
    Route::post('/register-driver', [AuthDriverController::class, "register"]);
    Route::post('/login', [AuthDriverController::class, "login"]);

    // Check the Phone for user.
    Route::post('/check-phone', [AuthDriverController::class, "checkPhone"]);
    //Check Code
    Route::post('reset/check_code', [AuthDriverController::class, "checkCode"]);
    //Change OR Reset Password.
    Route::post('reset/reset_password', [AuthDriverController::class, "resetPassword"]);

    //Route cities
    Route::get('/cities', [AuthDriverController::class, "cities"]);

    Route::post('/forget', [AuthDriverController::class, 'forget']);
    Route::post('/change_password_code', [AuthDriverController::class, 'change_password_code']);

    // Logout user.
    Route::post("/logout", [AuthDriverController::class, "logout"])->name("logout");

});


Route::group(['middleware' => 'auth:driver'], function () {

    Route::get('driver/all_order', [OrderController::class, "all_order"]);
    Route::get('driver/order/detail/{id}', [OrderController::class, "orderDetail"]);

    Route::match(['PUT','PATCH'],'driver/profile', [AuthDriverController::class, "updateProfile"]);

});
