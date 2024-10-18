<?php

use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\CertificateController;
use App\Http\Controllers\Frontend\CertificateIntegrityController;
use App\Http\Controllers\Frontend\CompanyController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\QgoSystemController;
use App\Http\Controllers\Frontend\ServiceController;
use App\Http\Controllers\Frontend\StepSystemController;
use App\Http\Controllers\Frontend\StudentSystemController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Auth::routes();
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::get('/about', [HomeController::class, 'about'])->name('about');
        Route::get('/service', [HomeController::class, 'service'])->name('service');
        Route::get('/portfolio', [HomeController::class, 'portfolio'])->name('portfolio');
        Route::get('/team', [HomeController::class, 'team'])->name('team');
        Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
        Route::post('/contact', [HomeController::class, 'contactPost'])->name('contact.store');
        Route::get('/privacy', [HomeController::class, 'privacy'])->name('privacy');
        Route::get('/terms', [HomeController::class, 'terms'])->name('terms');
    });


