<?php

namespace App\Http\Controllers\Frontend;

use App\Bll\Lang;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Qgo;
use App\Models\Setting;
use Illuminate\Http\Request;

class QgoSystemController extends Controller
{

    public function index()
    {
        $countries      = Country::get();
        $setting        = Setting::with('data')->first();
        $lang_id        = Lang::getSelectedLangId();
        $qgo_system     = Qgo::get();
        return view('Frontend.qgo_system.index' , compact('countries' , 'setting' , 'lang_id' , 'qgo_system'));
//        return view('layouts.Frontend._thanks');
    }
}
