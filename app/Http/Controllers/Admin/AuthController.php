<?php

namespace App\Http\Controllers\Admin;

use App\Bll\Lang;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\UpdadteProfile;
use App\Models\Role;
use App\Models\Vendor;
use App\Models\VendorCategory;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{

    public function register()
    {
        $lang_id = Lang::getSelectedLangId();

        return view('admin.register' , compact( 'lang_id'));
    }

    public function login(Request $request)
    {

        return view('admin.login');
    }


    public function doLogin(Request $request)
    {

        $user = User::where('email', $request->email)->first();

        if ($user) {
            $remember_me = $request->has('remember_me') ? true : false;
            if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $remember_me)) {
                session()->flash('info', __('messages.login_successfully'));
                return redirect()->to(route('admin.home'));
            } else {

                session()->flash('error', __('messages.password_error'));
                return redirect()->back();
            }
        } else {
            session()->flash('error', __('messages.user_not_found'));
            return redirect()->back();
        }
    }

    public function profile()
    {

        $user = User::where('id', auth()->user()->id)->first();
        $roles = Role::pluck('name', 'name')->all();
        if ($user) {

            return view('admin.admin.profile', compact('user', 'roles'));
        } else {
            session()->flash('error', __('messages.user_not_found'));
            return redirect()->back();
        }
    }

    public function updateProfile(UpdadteProfile $request)
    {
        $user = User::where('id', auth()->user()->id)->first();
        $image_in_db = $request->image;
        if ($request->has('image')) {
            $path = public_path() . '/uploads/admin';
            $image = request('image');
            $image_name = time() . request('image')->getClientOriginalName();
            $image->move($path, $image_name);
            $image_in_db = '/uploads/admin/' . $image_name;
        } else {
            $image_in_db = $user->image;
        }

        if ($request->status == "on") {
            $status = 1;
        } else {
            $status = 0;
        }

        if ($user != null) {
            $user->update([

                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'user_name' => $request->user_name,
                'email' => $request->email,
                'birth_date' => $request->birth_date,
                'status' => $status,
                'image' => $image_in_db,
            ]);

            $user->assignRole($request->input('roles_name'));
            session()->flash('success', __('messages.updated_successfully'));
            return redirect()->back();
        } else {
            session()->flash('error', __('messages.user_not_found'));
            return redirect()->back();
        }
    }

    protected function logout()
    {
        auth()->logout();
        return redirect()->route('admin.login');
    } //End of Logout
}
