<?php

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
                // Route Students
                Route::resource('/students', StudentController::class);
                //student upload file
                Route::get('/students/upload-file/{id}', [StudentController::class, 'uploadFile'])->name('students.upload');
                Route::put('/students/upload-file/{id}', [StudentController::class, 'storeFile'])->name('students.store_file');
                //Route Quiz
                Route::group(['middleware' => ['can:quizzes']], function () {
                    Route::resource('/quizzes', QuizController::class);
                });
                //Route Appointments
                Route::group(['middleware' => ['can:appointments']], function () {
                    Route::resource('/appointments', AppointmentController::class);
                });

                //category
                Route::group(['middleware' => ['can:categories']], function () {
                    Route::resource('/categories', CategoryController::class);
                });

                //post
                // Route::group(['middleware' => ['can:posts']], function () {
                    Route::resource('/posts', PostController::class);
                // });

                //Route certificate_integrity
                Route::group(['middleware' => ['can:certificate_integrity']], function () {
                   Route::resource('/certificate_integrity', CertificateIntegrityController::class);
                });

                //Route step_systems
                Route::group(['middleware' => ['can:step_systems']], function () {
                    Route::resource('/step_systems', StepSystemController::class);
                });

                //Route StudentSystem
                Route::group(['middleware' => ['can:student_systems']], function () {
                    Route::resource('/student_systems', StudentSystemController::class);
                });

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

                //Route Sectors
                Route::group(['middleware' => ['can:sectors']], function () {
                    Route::resource('/sectors', SectorController::class);
                });
                //Route Center
                Route::group(['middleware' => ['can:centers']], function () {
                    Route::resource('/centers', CenterController::class);
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

                //Route valuesServices
                Route::group(['middleware' => ['can:sliders']], function () {
                    Route::resource('/value-services', ValuesServicesController::class);
                });

                //Route companies
                Route::group(['middleware' => ['can:companies']], function () {
                    Route::resource('/companies', CompanyController::class);
                    Route::get('/companies/change-password/{id}', [CompanyController::class, 'changePassword'])->name('companies.change_password');
                    Route::put('/companies/update-password/{id}', [CompanyController::class, 'updatePassword'])->name('companies.update_password');
                });

                //Route Services
                Route::group(['middleware' => ['can:services']], function () {
                    Route::resource('/services', ServiceController::class);
                });
                //Route vision
                // Route::group(['middleware' => ['can:visions']], function () {
                    Route::get('/visions', [VisionController::class, 'edit'])->name('visions.edit');
                    Route::put('/visions', [VisionController::class, 'update'])->name('visions.update');
                // });

                //Route testimonials
                Route::group(['middleware' => ['can:testimonials']], function () {
                    Route::get('/testimonials', [TestimonialController::class, 'edit'])->name('testimonials.edit');
                    Route::put('/testimonials/{id}', [TestimonialController::class, 'update'])->name('testimonials.update');
                });

                //Route informations
                Route::group(['middleware' => ['can:informations']], function () {
                    Route::resource('/informations', InformationController::class);
                });

                //Route qgos
                Route::group(['middleware' => ['can:qgos']], function () {
                    Route::resource('/qgos', QgoController::class);
                });
            });
        });
    }
);
