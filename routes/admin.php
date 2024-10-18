<?php

use App\Http\Controllers\Admin\OurBusinessController;
use App\Http\Controllers\Admin\TeamController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Admin\{AuthController,
    CenterController,
    CertificateIntegrityController,
    CompanyController,
    CountryController,
    DashboardController,
    InformationController,
    QgoController,
    QuizController,
    SectorController,
    ServiceController,
    StepSystemController,
    StudentSystemController,
    TestimonialController,
    UserController,
    RoleController,
    SettingController,
    SliderController,
    PrivacyPolicyController,
    TermsConditionController,
    AboutController,
    ContactController,
    PostController,
    StateController,
    CategoryController,
    StudentController,
    AppointmentController,
    ValuesServicesController,
    VisionController};

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

Auth::routes(['except' => 'register']);

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () { //...
        Route::prefix('admin')->as('admin.')->group(function () {
            Route::get('login-show', [AuthController::class, 'login'])->name('login');
            Route::post('login', [AuthController::class, 'doLogin'])->name('do.login');

            Route::group(['middleware' => ['auth:web']], function () {

                Route::get('/', [DashboardController::class, 'index'])->name('home');
                Route::get('/profile', [AuthController::class, 'profile'])->name('profile.edit');
                Route::put('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');
                Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
                //posts
                // Route::group(['middleware' => ['can:posts']], function () {
                    Route::resource('/posts', PostController::class);
                // });

                //Route User
                Route::group(['middleware' => ['can:users']], function () {
                    Route::resource('/users', UserController::class);
                });

                //Route Roles
                Route::group(['middleware' => ['can:roles']], function () {
                    Route::resource('/roles', RoleController::class);
                });

                //Route Contacts
                Route::group(['middleware' => ['can:contacts']], function () {
                    Route::get('/contacts', [ContactController::class , 'index'])->name('contacts.index');
                    Route::get('/contacts/{id}', [ContactController::class , 'show'])->name('contacts.show');
                    Route::delete('/contacts/{id}', [ContactController::class , 'destroy'])->name('contacts.destroy');
                });
                //Route Settings
                Route::group(['middleware' => ['can:settings']], function () {
                    Route::get('/settings', [SettingController::class, 'edit'])->name('settings.edit');
                    Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');
                });
                //Route Country
                Route::group(['middleware' => ['can:countries']], function () {
                    Route::resource('/countries', CountryController::class);
                });

                //Route State
                Route::group(['middleware' => ['can:states']], function () {
                    Route::resource('/states', StateController::class);
                });

                //Route abouts
                Route::group(['middleware' => ['can:abouts']], function () {
                    Route::get('/abouts', [AboutController::class, 'edit'])->name('abouts.edit');
                    Route::put('/abouts', [AboutController::class, 'update'])->name('abouts.update');
                });
                //Route privacy_polices
                Route::group(['middleware' => ['can:privacy_polices']], function () {
                    Route::get('/privacy_polices', [PrivacyPolicyController::class, 'edit'])->name('privacy_polices.edit');
                    Route::put('/privacy_polices', [PrivacyPolicyController::class, 'update'])->name('privacy_polices.update');
                });
                //Route terms_conditions
                Route::group(['middleware' => ['can:terms_conditions']], function () {
                    Route::get('/terms_conditions', [TermsConditionController::class, 'edit'])->name('terms_conditions.edit');
                    Route::put('/terms_conditions', [TermsConditionController::class, 'update'])->name('terms_conditions.update');
                });

                //Route slider
                Route::group(['middleware' => ['can:sliders']], function () {
                    Route::resource('/sliders', SliderController::class);
                });

                //Route Services
                Route::group(['middleware' => ['can:services']], function () {
                    Route::resource('/services', ServiceController::class);
                });
                //route our business
                Route::group(['middleware' => ['can:our_businesses']], function () {
                    Route::resource('/our_businesses', OurBusinessController::class);
                });
                //route team
                Route::group(['middleware' => ['can:teams']], function () {
                    Route::resource('/teams', TeamController::class);
                });

            });
        });
    }
);
