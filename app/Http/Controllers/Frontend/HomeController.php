<?php

namespace App\Http\Controllers\Frontend;

use App\Bll\Lang;
use App\Models\Post;
use App\Models\Quiz;
use App\Models\About;
use App\Models\State;
use App\Models\Center;
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
        $valuesServices = ValuesServices::with('data')->get();
        $vision         = Vision::first();
        $testimonial    = Testimonial::first();
        $informations   = Information::get();
        $setting        = Setting::with('data')->first();
        $languags       = Language::get();
        $lang_id        = Lang::getSelectedLangId();
        return view('layouts.Frontend.index', compact('about', 'languags', 'lang_id','valuesServices','vision','testimonial','informations','setting'));
    }

    public function appointement()
    {
        $languags   = Language::get();
        $lang_id    = Lang::getSelectedLangId();
        $states     = State::get();
        $centers    = Center::get();
        $quizzes    = Quiz::get();
        $setting        = Setting::with('data')->first();

        return view('Frontend.appointement', compact('languags', 'lang_id', 'states', 'quizzes', 'centers', 'setting'));
    }

    public function getCenters($center_id)
    {
        $centers = Center::with('data')->where('state_id', $center_id)->get();
        return response()->json($centers);
    }

    public function add_appointement(StoreRequestAppointment $request)
    {
         try {
            DB::beginTransaction();
            $appointment = Appointment::create($request->all());

            DB::commit();
            session()->flash('success', __('messages.appointment_successfully'));
            return redirect()->route('thanks');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('custom')->error('Error in Frontend\HomeController@add_appointement: ' . $e->getMessage());
            return back()->with('error', 'Something went wrong');
        }
    }

    public function contact()
    {
        $languags = Language::get();
        $lang_id  = Lang::getSelectedLangId();
        $setting  = Setting::with('data')->first();
        return view('Frontend.contacts', compact('languags', 'lang_id', 'setting'));
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

    public function valuesServices()
    {
        $valuesServices = ValuesServices::with('data')->get();
        $lang_id        = Lang::getSelectedLangId();
        return view('Frontend.values_services', compact('valuesServices', 'lang_id'));
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

    public function blogs()
    {
        $languags = Language::get();
        $lang_id  = Lang::getSelectedLangId();
        $setting  = Setting::with('data')->first();
        $posts    = Post::paginate(6);
        return view('Frontend.blogs', compact('languags', 'lang_id', 'posts', 'setting'));
    }

    public function blogDetails($id)
    {
        $languags = Language::get();
        $lang_id  = Lang::getSelectedLangId();
        $setting  = Setting::with('data')->first();
        $post     = Post::find($id);
        return view('Frontend.blog_details', compact('languags', 'lang_id', 'post', 'setting'));
    }

    public function addComment(Request $request, $post_id)
    {

        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|max:255',
            'phone'     => 'required|numeric',
            'body'      => 'required|string|max:255',

        ]);


       Comment::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'body'      => $request->body,
            'post_id'   => $post_id,
        ]);
        session()->flash('success', __('messages.comment_successfully'));
        return back();
    }

    public function thanks()
    {
        $languags = Language::get();
        $lang_id  = Lang::getSelectedLangId();
        return view('layouts.Frontend._thanks', compact('languags', 'lang_id'));
    }



}
