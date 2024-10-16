<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\HelpSupportResource;
use App\Models\HelpSupport;
use App\Models\Order;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function help(Request $request)
    {
        $help_support = HelpSupport::where('name', 'help_support')->first();

        return $help_support
            ? HelpSupportResource::make($help_support)
            : response()->json([
                "message" => "No Help Support Found"
            ], 400);
    }
    public function terms(Request $request)
    {
        $terms_condition = HelpSupport::where('name', 'terms_condition')->first();

        return $terms_condition
            ? HelpSupportResource::make($terms_condition)
            : response()->json([
                "message" => "No Terms Conditions Found"
            ], 400);
    }
    public function privacy(Request $request)
    {
        $privacy_policy = HelpSupport::where('name', 'privacy_policy')->first();

        return $privacy_policy
            ? HelpSupportResource::make($privacy_policy)
            : response()->json([
                "message" => "No Privacy And Policy Found"
            ], 400);
    }
}
