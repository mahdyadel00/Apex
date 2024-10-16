<?php

namespace App\Http\Controllers\Api\v1\Driver;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Driver\ChangePasswordByCodeRequest;
use App\Http\Requests\Api\v1\Driver\EditProfile;
use App\Http\Requests\Api\v1\Driver\ForgetPasswordRequest;
use App\Http\Requests\Api\v1\Driver\Login;
use App\Http\Requests\Api\v1\Driver\Register;
use App\Http\Resources\Api\v1\ErrorResource;
use App\Http\Resources\Api\v1\SuccessResource;
use App\Models\Driver;
use GuzzleHttp\RequestOptions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AuthDriverController extends Controller
{

    public function register(Request $request)
    {
        try {
            $code = rand(1000, 9999);
           $driver = Driver::create([
               'user_name'      => $request->user_name,
                'email'          => $request->email,
                'phone'          => $request->phone,
                'password'       => Hash::make($request->password),
                'api_token'      => Str::random(60),
                'code'           => $code,
                'is_active'      => 0,
            ]);
            $message = "Registration code in Taosel is $code";
            $to = $request->phone;
            //http guzzle

            $client_sms = new \GuzzleHttp\Client([
                'base_uri' => "https://pwjlre.api.infobip.com",
                'headers' => [
                    'Authorization' => "App 5f88cc47cb43aa3d6284663e75459a03-b9b3bf16-4f0e-4774-a429-c2d8e6bff732",
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ]
            ]);
            $response = $client_sms->request(
                'POST',
                'sms/2/text/advanced',
                [
                    RequestOptions::JSON => [
                        'messages' => [
                            [
                                'from' => __('dashboard.taosel'),
                                'destinations' => [
                                    ['to' => "$to"]
                                ],
                                'text' => $message,
                            ]
                        ]
                    ],
                ]
            );
            if ($driver) {
                return SuccessResource::make([
                    'message'   => __('auth.register_success'),
                    'token'     => $driver->api_token,
                ])->withWrappData();
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('website')->error('error in AuthDriverController@register: ' . $e->getMessage() . ' at Line: ' . $e->getLine() . ' in File: ' . $e->getFile());
            return (new ErrorResource(__('auth.register_failed')));
        }
    }

    public function login(Login $request)
    {
        try {
            DB::beginTransaction();
            $driver = Driver::where('phone', $request->phone)->first();

            if (!$driver) {
                return (new ErrorResource(__('auth.login_failed')));
            }
            if (!Hash::check($request->password, $driver->password)) {
                return (new ErrorResource(__('auth.login_failed')));
            }

            if ($driver->where(['phone' => $request->phone, 'password' => Hash::make($request->password)])) {
                DB::commit();
                return SuccessResource::make([
                    'message'   => __('auth.login_success'),
                    'token'     => $driver->api_token,
                ])->withWrappData();
            } else {
                return (new ErrorResource(__('auth.login_failed')));
            }
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            Log::channel('website')->error('error in AuthDriverController@login: ' . $e->getMessage() . ' at Line: ' . $e->getLine() . ' in File: ' . $e->getFile());
            return (new ErrorResource(__('auth.login_failed')));
        }
    }


    public function forget(ForgetPasswordRequest $request)
    {
        try {
        $validator = $request->validated();
        $user = Driver::where('phone', $validator['phone'])->first();

        if ($user != null) {
            $code = random_int(1000,9999);
            $user->update([
                'reset_code'=>$code
            ]);
//            Mail::send('mail.resetPassword',["code"=>$code], function ($message) use ($user) {
//                $message->to($user->email);
//                $message->subject(__('api.Reset Password'));
//            });

            $message = __('api.the message was send to your mail , please reset');
            return SuccessResource::make([
                'message' => $message,
            ])->withWrappData();
        } else {

            $message = __('api.wrong phone');
            return response()->json([
                'message' => $message,
            ]);
        }

        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('website')->error('error in AuthClientController@changePassword: ' . $e->getMessage() . ' at Line: ' . $e->getLine() . ' in File: ' . $e->getFile());
            return response()->json([
                'message' => __('auth.login_failed'),
            ]);
        }
    }


    public function change_password_code(ChangePasswordByCodeRequest $request)
    {
        try {
        $validator = $request->validated();
        $user = Driver::where('reset_code', $validator['code'])->first();
        if ($user != null) {
            $user->update(['password' => Hash::make($request->newPassword), 'reset_code' => null]);


            $message = __('api.Update Password successfully');
            return SuccessResource::make([
                'message' => $message,
            ])->withWrappData();
        } else {

            $message = __('api.wrong code');
            return response()->json([
                'message' => $message,
            ]);

        }

        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('website')->error('error in AuthClientController@changePassword: ' . $e->getMessage() . ' at Line: ' . $e->getLine() . ' in File: ' . $e->getFile());
            return response()->json([
                'message' => __('auth.login_failed'),
            ]);
        }

    }

    public function updateProfile(EditProfile $request)
    {
        try {
            DB::beginTransaction();
            $driver = Driver::where('id', Auth::guard('driver')->user()->id)->first();
            if (!$driver) {
                return new ErrorResource(__('auth.login_failed'));
            }
            $driver->update($request->safe()->except('logo','driving_image','driving_license','car_image'));

            if (count($request->files) > 0) {
                saveMedia($request, $driver);
            }

            DB::commit();
            return SuccessResource::make([
                'message' => __('auth.profile_updated_success'),
            ])->withWrappData();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('website')->error('error in AuthClientController@editProfile: ' . $e->getMessage() . ' at Line: ' . $e->getLine() . ' in File: ' . $e->getFile());
            return new ErrorResource(__('auth.login_failed'));
        }
    }


}
