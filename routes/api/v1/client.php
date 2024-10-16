<?php

use App\Http\Controllers\Api\v1\Client\{VendorCategoryController, VendorController};
use App\Http\Controllers\Api\v1\Client\AuthClientController;
use Illuminate\Support\Facades\Route;

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
//    Route::get('/cities', [AuthClientController::class, "cities"]);

//    // Logout user.
//    Route::post("/logout", [AuthClientController::class, "logout"])->name("logout");

});

Route::group(['middleware' => 'auth:client'], function () {

    //Route Profile
    Route::get('/profile', function () {
        dd('profile');
    });
    Route::post('/profile', [AuthClientController::class, "updateProfile"]);
});
Route::group(['prefix' => '/client'], function () {

    //Route Vendor Category
    Route::get('/vendor-categories', [VendorCategoryController::class, "index"]);
    Route::get('/vendor-categories/{id}', [VendorCategoryController::class, "show"]);
    //Route Vendor
    Route::get('/vendors', [VendorController::class, "index"]);
    Route::get('/vendors/{id}', [VendorController::class, "show"]);

});
