<?php

namespace App\Http\Controllers\Api\v1\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\ClientAuth\{ChangeNotificaion,
    ChangePassword,
    CheckCode,
    checkPhone,
    EditProfile,
    Login,
    Register};
use App\Http\Resources\Api\v1\{Client\ClientResource, ErrorResource, SuccessResource};
use App\Models\{Client, Driver};
use GuzzleHttp\RequestOptions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, DB, Hash, Log, Storage};
use Illuminate\Support\Str;

class AuthClientController extends Controller
{
    public function register(Register $request)
    {
        try {
            $code = rand(1000, 9999);
            $client = \App\Models\Client::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'code' => $code,
                'api_token' => Str::random(80),
            ]);
            $message = "Your verification code is: " . $code;
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
            if ($client) {
                return SuccessResource::make([
                    'message' => __('auth.register_success'),
                    'token' => $client->api_token,
                ])->withWrappData();
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('website')->error('error in AuthClientController@register: ' . $e->getMessage() . ' at Line: ' . $e->getLine() . ' in File: ' . $e->getFile());
            return (new ErrorResource(__('auth.register_failed')));
        }
    }


    public function login(Login $request)
    {
        try {
            DB::beginTransaction();
            $client = Client::where('phone', $request->phone)->first();
            if (!$client) {
                return (new ErrorResource(__('auth.login_failed')));
            }
            if (!Hash::check($request->password, $client->password)) {
                return (new ErrorResource(__('auth.login_failed')));
            }
            //update app_device
//            if ($request->has('app_device')) $client->deviceTokens()->firstOrCreate(['app_device' => $request->app_device]);

            if ($client->where(['phone' => $request->phone, 'password' => Hash::make($request->password)])) {
                $client->update([
                    'device_token' => $request->device_token,
                ]);
                DB::commit();
                return SuccessResource::make([
                    'message' => __('auth.login_success'),
                    'token' => $client->api_token,
                ])->withWrappData();
            } else {
                return (new ErrorResource(__('auth.login_failed')));
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('website')->error('error in AuthClientController@login: ' . $e->getMessage() . ' at Line: ' . $e->getLine() . ' in File: ' . $e->getFile());
            return (new ErrorResource(__('auth.login_failed')));
        }
    }

    public function updateProfile(EditProfile $request)
    {
        try {
            DB::beginTransaction();
            $client = Client::where('id', Auth::guard('api')->user()->id)->first();
            if (!$client) {
                return new ErrorResource(__('auth.login_failed'));
            }
            $client->update($request->safe()->except('path'));

            if (count($request->files) > 0) {
                saveMedia($request, $client);
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

    public function profile()
    {
        try {
            DB::beginTransaction();

            $client = Client::where('id', Auth::guard('api')->user()->id)->first();
            if (!$client) {
                return new ErrorResource(__('auth.login_failed'));
            }

            DB::commit();
            return ClientResource::make($client);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('website')->error('error in AuthClientController@profile: ' . $e->getMessage() . ' at Line: ' . $e->getLine() . ' in File: ' . $e->getFile());
            return new ErrorResource(__('auth.login_failed'));
        }
    }

    public function logout()
    {
        try {
            DB::beginTransaction();
            $client = Client::where('id', Auth::guard('api')->user()->id)->first();
            $client->update([
                'api_token' => null,
            ]);
            DB::commit();
            return SuccessResource::make([
                'message' => __('auth.logout_success'),
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('website')->error('error in AuthClientController@logout: ' . $e->getMessage() . ' at Line: ' . $e->getLine() . ' in File: ' . $e->getFile());
           return new ErrorResource(__('auth.login_failed'));
        }
    }

    public function verifyPhone(CheckCode $request)
    {
        try {
            DB::beginTransaction();
            $client = CLient::where('code', $request->code)->first();

            if (!$client) {
                return new ErrorResource(__('auth.login_failed'));
            } else {
                return SuccessResource::make([
                    'message' => __('auth.email_verify_success'),
                ])->withWrappData();
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('website')->error('error in AuthClientController@verify: ' . $e->getMessage() . ' at Line: ' . $e->getLine() . ' in File: ' . $e->getFile());
            return new ErrorResource(__('auth.login_failed'));
        }
    }

    public function checkPhone(checkPhone $request)
    {
        try {
            DB::beginTransaction();
            $client = Client::where('phone', $request->phone)->first();
            if (!$client) {
                return new ErrorResource(__('auth.login_failed'));
            }
            $code = rand(1000, 9999);
            $message = "Your verification code is: " . $code;
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
            if ($client) {
                $client->update([
                    'code' => $code,
                ]);
                DB::commit();
                return SuccessResource::make([
                    'message' => __('auth.email-verify-success'),
                ])->withWrappData();
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('website')->error('error in AuthClientController@register: ' . $e->getMessage() . ' at Line: ' . $e->getLine() . ' in File: ' . $e->getFile());
            return (new ErrorResource(__('auth.register_failed')));

        }
    }

    public function checkCode(CheckCode $request)
    {
        try {
            DB::beginTransaction();
            $client = Client::where('code', $request->code)->first();
            if (!$client) {
                return new ErrorResource(__('auth.login_failed'));
            }
            if ($client->code == $request->code) {
                $client->update([
                    'code' => null,
                ]);
                DB::commit();
                return SuccessResource::make([
                    'message' => __('auth.email_verify_success'),
                ])->withWrappData();
            } else {
                return new ErrorResource(__('auth.login_failed'));
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('website')->error('error in AuthClientController@register: ' . $e->getMessage() . ' at Line: ' . $e->getLine() . ' in File: ' . $e->getFile());
            return new ErrorResource(__('auth.login_failed'));
        }
    }

    public function resetPassword(Request $request)
    {
        try {
            DB::beginTransaction();
            $client = Client::where(auth()->id())->first();

            if (!$client) {
                return new ErrorResource(__('auth.login_failed'));
            }
            $client->update([
                'password' => Hash::make($request->password),
            ]);
            DB::commit();
            return SuccessResource::make([
                'message' => __('auth.password_reset_success'),
            ])->withWrappData();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('website')->error('error in AuthClientController@resetPassword: ' . $e->getMessage() . ' at Line: ' . $e->getLine() . ' in File: ' . $e->getFile());
            return new ErrorResource(__('auth.login_failed'));
        }
    }

    public function changePassword(ChangePassword $request)
    {
        try {
            DB::beginTransaction();
            $driver = Driver::where('id', Auth::guard('api')->user()->id)->first();
            if (!$driver) {
               return new ErrorResource(__('auth.login_failed'));
            }

                $driver->update([
                    'password' => Hash::make($request->new_password),
                ]);
                DB::commit();
                return SuccessResource::make([
                    'message' => __('auth.password_change_successfully'),
                ])->withWrappData();

        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('website')->error('error in AuthClientController@changePassword: ' . $e->getMessage() . ' at Line: ' . $e->getLine() . ' in File: ' . $e->getFile());
            return response()->json([
                'message' => __('auth.login_failed'),
            ]);
        }
    }

    public function deleteAccount()
    {
        try {
            DB::beginTransaction();
            $client = Client::where('id', Auth::guard('api')->user()->id)->first();
            if (!$client) {
                return new ErrorResource(__('auth.login_failed'));
            }
            $client->delete();
            DB::commit();
            return SuccessResource::make([
                'message' => __('auth.account_deleted_successfully'),
            ])->withWrappData();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('website')->error('error in AuthClientController@deleteAccount: ' . $e->getMessage() . ' at Line: ' . $e->getLine() . ' in File: ' . $e->getFile());

            return new ErrorResource(__('auth.login_failed'));
        }
    }


    public function changeNotification(ChangeNotificaion $request)
    {
        try {
            DB::beginTransaction();
            $client = Client::where('id', Auth::guard('api')->user()->id)->first();
            if (!$client) {
                return new ErrorResource(__('auth.login_failed'));
            }

            $client->update([
                'show_notification' => $request->show_notification
            ]);
            DB::commit();
            return SuccessResource::make([
                'message' => __('auth.show_notification_change_successfully'),
            ])->withWrappData();

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => __('auth.show_notification_change_failed'),
            ]);
        }
    }



}
