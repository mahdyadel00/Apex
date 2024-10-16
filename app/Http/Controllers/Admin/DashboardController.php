<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Appointment,
    Category,
    Center,
    CertificateIntegrity,
    City,
    Contact,
    Country,
    Order,
    Product,
    Quiz,
    Slider,
    State,
    StepSystem,
    Student,
    StudentSystem,
    User,
    Driver,
    Vendor};
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web')->except('logout');
    }

    protected function index()
    {
        $users                      = User::get();
        $sliders                    = Slider::get();
        $states                     = State::get();
        $students                   = Student::get();
        $appointments               = Appointment::get();
        $contacts                   = Contact::get();
        $quizzes                    = Quiz::get();
        $centers                    = Center::get();
        $certificate_integrations   = CertificateIntegrity::get();
        $step_systems               = StepSystem::get();
        $student_systems            = StudentSystem::get();
        return view('admin.dashboard' , compact('users'  , 'sliders' , 'states' , 'students' , 'appointments' , 'contacts' , 'quizzes' , 'centers'
            , 'certificate_integrations' , 'step_systems' , 'student_systems'));

    }// end of index


}
