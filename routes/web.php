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

        //route login
        Route::get('/login', [AuthController::class, 'login'])->name('login');
        Route::post('/login-post', [AuthController::class, 'loginPost'])->name('login_post');

        Route::get('/login-company', [AuthController::class, 'loginCompany'])->name('login_company');
        Route::post('/login-company-post', [AuthController::class, 'loginCompanyPost'])->name('login_company_post');


        //Route Qgo
        Route::get('/login-qgo', [AuthController::class, 'loginQgo'])->name('login_qgo');
        Route::post('/login-qgo-post', [AuthController::class, 'loginQgoPost'])->name('login_qgo_post');

        //Route qgo_system
        Route::get('/qgo-system', [QgoSystemController::class, 'index'])->name('qgo_system.index');

        //route register
        Route::get('/register', [AuthController::class, 'register'])->name('register');
        Route::post('/register', [AuthController::class, 'registerPost'])->name('register_post');

        //route logout
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

        //route Student profile
        Route::get('/student_profile', [AuthController::class, 'profile'])->name('student_profile');
        Route::post('student_profile-update',[AuthController::class,'update_profile'])->name('profile.update');

        //route User profile
        Route::get('/user_profile', [AuthController::class, 'user_profile'])->name('user_profile');
        Route::post('user_profile-update',[AuthController::class,'update_user_profile'])->name('user_profile.update');

        Route::get('/', [HomeController::class, 'index'])->name('home');

        //Route Company profile
        Route::get('/company_profile', [CompanyController::class, 'profile'])->name('company_profile');
        Route::post('company_profile-update',[CompanyController::class,'updateProfile'])->name('company_profile.update');
        Route::get('/company-show/{id}', [CompanyController::class, 'show'])->name('company.show');
        Route::get('/company-edit/{id}', [CompanyController::class, 'edit'])->name('company.edit');
        Route::post('/company-update/{id}', [CompanyController::class, 'update'])->name('company.update');
        Route::delete('/company-delete/{id}', [CompanyController::class, 'destroy'])->name('company.destroy');
        Route::get('/about', [HomeController::class, 'about'])->name('about');

        //route service
        Route::get('/service', [HomeController::class, 'service'])->name('service');

        //route teams
        Route::get('/teams', [HomeController::class, 'teams'])->name('teams');

        //route services
        Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
        //route service store
        Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
        //route get states
        Route::get('/get-states/{id}', [ServiceController::class, 'getStates'])->name('get.states');
        Route::get('/get-sectors/{id}', [ServiceController::class, 'getSectors'])->name('get.sectors');
        //route get-companies
        Route::get('/get-companies/{id}', [ServiceController::class, 'getCompanies'])->name('get.companies');

        //route blogs
        Route::get('/blogs', [HomeController::class, 'blogs'])->name('blogs');
        Route::get('/blog-details/{id}', [HomeController::class, 'blogDetails'])->name('blog-details');
        //comments
        Route::post('/add-comment/{post_id}', [HomeController::class, 'addComment'])->name('comments.store');

        //route contact
        Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

        //Route certificates
        Route::get('/certificates', [CertificateController::class, 'index'])->name('certificates.index');
        //route Appointement
        Route::get('/appointement', [HomeController::class, 'appointement'])->name('appointement');
        Route::post('/add-appointement', [HomeController::class, 'add_appointement'])->name('add-appointement');

        Route::get('/get-centers/{center_id}', [HomeController::class, 'getCenters'])->name('get-centers');

        //route thanks
        Route::get('/thanks', [HomeController::class, 'thanks'])->name('thanks');
        Route::group(['middleware'=> 'certificatetypecheck'],function(){
        //route certificate_integrity
        Route::get('/certificate-integrity', [CertificateIntegrityController::class, 'index'])->name('certificate_integrity.index');
        //route certificate_integrity
        Route::post('/certificate-integrity', [CertificateIntegrityController::class, 'store'])->name('certificate_integrity.store');

    });



        Route::group(['middleware'=> 'studenttypecheck'],function(){
        //route student_system
        Route::get('/student-system', [StudentSystemController::class, 'index'])->name('student_system.index');
        //route student_system store
        Route::post('/student-system', [StudentSystemController::class, 'store'])->name('student_system.store');
    });
        //route step_system

        Route::group(['middleware'=> 'steptypecheck'],function(){
        Route::get('/step-system', [StepSystemController::class, 'index'])->name('step_system.index');
        //route step_system store
        Route::post('/step-system', [StepSystemController::class, 'store'])->name('step_system.store');

        });

    }
);
