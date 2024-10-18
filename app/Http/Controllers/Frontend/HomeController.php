<?php

namespace App\Http\Controllers\Frontend;

use App\Bll\Lang;
use App\Http\Requests\Front\Contact\StoreContactRequest;
use App\Models\Contact;
use App\Models\OurBusiness;
use App\Models\Post;
use App\Models\PrivacyPolicy;
use App\Models\Quiz;
use App\Models\About;
use App\Models\Service;
use App\Models\State;
use App\Models\Center;
use App\Models\Team;
use App\Models\Vision;
use App\Models\Comment;
use App\Models\Setting;
use App\Models\Language;
use App\Models\Appointment;
use App\Models\Information;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Models\ValuesServices;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Appointment\StoreAppointmentRequest;
use App\Http\Requests\Front\Appointment\StoreRequestAppointment;

class HomeController extends Controller
{
    public function index()
    {
        $about          = About::first();
        $setting        = Setting::with('data')->first();
        $languages      = Language::get();
        $lang_id        = Lang::getSelectedLangId();
        $our_business   = OurBusiness::take(6)->get();
        $services       = Service::take(4)->get();
        $teams          = Team::take(4)->get();
        return view('layouts.Frontend.index', compact('about', 'setting', 'languages', 'lang_id', 'services', 'our_business', 'teams'));
    }


    public function contact()
    {
        $languags = Language::get();
        $lang_id  = Lang::getSelectedLangId();
        $setting  = Setting::with('data')->first();
        return view('Frontend.contacts', compact('languags', 'lang_id', 'setting'));
    }

    public function contactPost(StoreContactRequest $request)
    {
        try{
            DB::beginTransaction();

            $contact = Contact::create($request->safe()->all());

            DB::commit();
            return redirect()->back()->with('success', 'Your message has been sent successfully');
        }catch(\Exception $e){
            DB::rollBack();
            Log::channel('error')->error($e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }


    public function about()
    {
        $languags = Language::get();
        $lang_id  = Lang::getSelectedLangId();
        $about    = About::first();
        $setting  = Setting::with('data')->first();
        $testimonial    = Testimonial::first();
        return view('Frontend.about', compact('languags', 'lang_id' , 'about','setting','testimonial'));
    }


    public function service()
    {
        $languags = Language::get();
        $lang_id  = Lang::getSelectedLangId();
        return view('Frontend.service', compact('languags', 'lang_id'));
    }

    public function teams()
    {
        $languags = Language::get();
        $lang_id  = Lang::getSelectedLangId();
        return view('Frontend.teams', compact('languags', 'lang_id'));
    }

    public function privacy ()
    {
        $languags   = Language::get();
        $lang_id    = Lang::getSelectedLangId();
        $setting    = Setting::first();
        $privacy    = PrivacyPolicy::first();
        return view('Frontend.privacy', compact('languags', 'lang_id', 'privacy', 'setting'));
    }



}
