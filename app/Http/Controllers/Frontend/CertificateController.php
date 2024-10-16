<?php

namespace App\Http\Controllers\Frontend;

use App\Bll\Lang;
use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Setting;
use App\Models\Student;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    protected  function index(Request $request)
    {


       
        $serial=request('serial');
        $students = Student::with('media')->where('serial_number',$serial)->get();

        $languags = Language::get();
        $lang_id  = Lang::getSelectedLangId();
        $setting  = Setting::with('data')->first();


        return view('Frontend.certificate.index' , compact('students' , 'languags' , 'lang_id' , 'setting'));
    }
}
