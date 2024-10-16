<?php

use App\Http\Controllers\Api\v1\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\Auth\RestPasswordController;

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

foreach (['admin', 'teacher', 'student', 'client'] as $role) {
    Route::prefix($role)->group(function () use ($role) {

        if ($role !== 'admin') {
            // Register new user and return generated token for user.
            Route::post("/register", [AuthController::class, "register"])->name("$role.register")->middleware('throttle:6,1');
        }

        // Login and return generated token for user.
        Route::post("/login", [AuthController::class, "login"])->name("$role.login")->middleware('throttle:6,1');

        // Check the Email for user.
        Route::post("/check-email", [RestPasswordController::class, "checkEmail"])->name("$role.check_email");
        // Verify email
        Route::get('/email/verify/{id}/{hash}', [AuthController::class, '__invoke'])
            ->middleware(['signed', 'throttle:6,1'])
            ->name("verification.verify");

        // Reset password.
        Route::middleware(['throttle:6,1'])->group(function () use ($role) {
            Route::post('reset/check_code', [RestPasswordController::class, "checkCode"])->name("$role.check_code");
            Route::post('reset/reset_password', [RestPasswordController::class, "resetPassword"])->name("$role.reset_password");
        });

        Route::group(['middleware' => ['auth:sanctum', 'verified']], function () use ($role) {
            // Logout user.

            Route::post("/logout", [AuthController::class, "logout"])->name("$role.logout");

            // Edit user profile.
            Route::put("/edit-profile", [AuthController::class, "editProfile"])->name("$role.edit_profile");

            // Delete user profile.
            Route::delete("/delete-profile", [AuthController::class, "deleteProfile"])->name("$role.delete_profile");

            // get access token
          //  Route::get('/access-token', [AuthController::class, 'getAccessToken'])->name("$role.access_token");

            // get my profile
            Route::get('/profile', [AuthController::class, 'getProfile'])->name("$role.profile");
        });
    });
}

