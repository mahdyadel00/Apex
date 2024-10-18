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
        $contacts                   = Contact::get();
        return view('admin.dashboard' , compact('users', 'sliders', 'states', 'contacts'));
    }// end of index


}
