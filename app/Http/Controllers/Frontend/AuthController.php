<?php

namespace App\Http\Controllers\Frontend;

use App\Bll\Lang;
use App\Models\Company;
use App\Models\Qgo;
use App\Models\User;
use App\Models\Setting;
use App\Models\Student;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        $setting    = Setting::with('data')->first();
        $languags   = Language::get();
        $lang_id    = Lang::getSelectedLangId();
        return view('Frontend.auth.login', compact('setting', 'languags', 'lang_id'));
    }

    public function loginPost(Request $request)
    {
        //  dd($request->all());
        try {
            DB::beginTransaction();
            if (Auth::guard('web')->attempt(['email' => request('email'), 'password' => request('password')]))
                return redirect()->route('home');

            $request->session()->flash('error', 'Invalid e-mail or password.');

            return redirect()->back()->with('error', 'Email or password is wrong');
        } catch (\Exception $e) {
            DB::rollback();
            Log::channel('custom')->error('Error in loginPost function in AuthController :' . $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function loginCompany()
    {
        $setting = Setting::with('data')->first();
        $languags = Language::get();
        $lang_id = Lang::getSelectedLangId();
        return view('Frontend.auth.login_company', compact('setting', 'languags', 'lang_id'));
    }

    public function loginCompanyPost(Request $request)
    {
        try {
            DB::beginTransaction();

            $company = Company::where('email', $request->email)->first();

            if ($company && Hash::check($request->password, $company->password)) {
                Auth::guard('company')->login($company);
                return redirect()->route('company_profile');
            }

            if ($company && Hash::check($request->password, $company->password)) {
                Auth::guard('company')->login($company);

                if ($company->type == 'certificate') {
                    return redirect()->route('certificate_integrity.index');
                }

                if ($company->type == 'step') {
                    return redirect()->route('step_system.index');
                }

                if ($company->type == 'student') {
                    return redirect()->route('student_system.index');
                }
                return redirect()->back();
            }

            $request->session()->flash('error', 'Invalid e-mail or password.');

            return redirect()->back()->with('error', 'Email or password is wrong');
        } catch (\Exception $e) {
            DB::rollback();
            dd($e->getMessage());
            Log::channel('custom')->error('Error in loginPost function in AuthController :' . $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function loginQgo()
    {
        $setting    = Setting::with('data')->first();
        $languags   = Language::get();
        $lang_id    = Lang::getSelectedLangId();
        return view('Frontend.auth.login_qgo', compact('setting', 'languags', 'lang_id'));
    }

    public function loginQgoPost(Request $request)
    {
        try {
            DB::beginTransaction();

            $qgo = Qgo::where('email', $request->email)->first();

            if ($qgo && Hash::check($request->password, $qgo->password)) {
                Auth::guard('qgo')->login($qgo);

                    return redirect()->route('qgo_system.index');
            }

            $request->session()->flash('error', 'Invalid e-mail or password.');

            return redirect()->back()->with('error', 'Email or password is wrong');
        } catch (\Exception $e) {
            DB::rollback();
            dd($e->getMessage());
            Log::channel('custom')->error('Error in loginPost function in AuthController :' . $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function register()
    {
        $setting    = Setting::with('data')->first();
        $languags   = Language::get();
        $lang_id    = Lang::getSelectedLangId();
        return view('Frontend.auth.register', compact('setting', 'languags', 'lang_id'));
    }

//    public function registerPost(Request $request)
//    {
//        //    dd($request->all());
//        //validate the fields
//        $request->validate([
//            'name'          => ['required', 'string', 'max:255'],
//            'email'         => ['required', 'string', 'email', 'max:255', 'unique:users'],
//            'password'      => ['required', 'string', 'min:8', 'confirmed'],
//            'phone'         => ['required', 'string', 'max:255'],
//        ]);
//        try {
//            DB::beginTransaction();
//            $student                = Student::create([
//                'serial_number'     => rand(100000, 999999),
//                'name'              => $request->name,
//                'email'             => $request->email,
//                'password'          => Hash::make($request->password),
//                'phone'             => $request->phone,
//            ]);
//
//            DB::commit();
//            session()->flash('success', 'Student created successfully');
//            return redirect()->route('thanks');
//        } catch (\Exception $e) {
//            DB::rollBack();
//            Log::channel('custom')->error('Error in registerPost function in AuthController :' . $e->getMessage());
//            return redirect()->back()->with('error', $e->getMessage());
//        }
//    }

    public function registerPost(Request $request)
    {
        //    dd($request->all());
        //validate the fields
        $request->validate([
            'name'          => ['required', 'string', 'max:255'],
            'email'         => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'      => ['required', 'string', 'min:8', 'confirmed'],
            'phone'         => ['required', 'string', 'max:255'],
        ]);
        try {
            DB::beginTransaction();
            $user                   = User::create([
                'name'              => $request->name,
                'email'             => $request->email,
                'password'          => Hash::make($request->password),
                'phone'             => $request->phone,
            ]);

            DB::commit();
            session()->flash('success', 'Student created successfully');
            return redirect()->route('login');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('custom')->error('Error in registerPost function in AuthController :' . $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('student')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function profile()
    {
        $setting = Setting::with('data')->first();
        $languags = Language::get();
        $lang_id = Lang::getSelectedLangId();

        return view('Frontend.auth.profile', compact('setting', 'languags', 'lang_id'));
    }

    public function update_profile(Request $request)
    {
        $student = Student::where('id', Auth::guard('student')->user()->id)->first();
        //validate the fields
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
        ]);
        $student->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'updated_at' => now()
        ]);
        session()->flash('success', __('messages.profile_updated_successfully'));
        return redirect()->back();
    }

    public function user_profile()
    {
        try{
            DB::beginTransaction();
            $setting    = Setting::with('data')->first();
            $languags   = Language::get();
            $lang_id    = Lang::getSelectedLangId();
            $user       = User::where('id', Auth::user()->id)->first();

            DB::commit();
            return view('Frontend.auth.user_profile', compact('setting', 'languags', 'lang_id', 'user'));

        }catch (\Exception $e){
            DB::rollback();
            Log::channel('custom')->error('Error in user_profile function in AuthController :' . $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
