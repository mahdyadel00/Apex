<?php

namespace App\Http\Controllers\Frontend;

use App\Bll\Lang;
use App\Http\Controllers\Controller;
use App\Http\Requests\Front\Services\StoreServiceRequest;
use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\Language;
use App\Models\Sector;
use App\Models\Service;
use App\Models\Setting;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ServiceController extends Controller
{
    public function index()
    {
        $setting        = Setting::with('data')->first();
        $languags       = Language::get();
        $lang_id        = Lang::getSelectedLangId();
        $cities         = City::get();
        $companies      = Company::get();
        $countries      = Country::get();
        $states         = State::get();
        $sectors        = Sector::get();

        return view('Frontend.services.index', compact('setting', 'languags', 'lang_id', 'cities', 'companies', 'countries', 'states', 'sectors'));
    }

    public function store(StoreServiceRequest $request)
    {
        try{
            DB::beginTransaction();
            // Create new multi information
            foreach ($request->information as $key => $value) {

                $service = Service::create([
                    'user_id'       => auth()->user()->id,
                    'company_id'    => $request->company_id,
                    'information'   => $value,
                ]);
            }
            DB::commit();
            session()->flash('success',  __('messages.success_created_service'));
            return redirect()->route('services.index');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            Log::channel('stderr')->error($e->getMessage());
            session()->flash('error',  __('messages.error_created_service'));
            return redirect()->route('services.index');
        }
    }
    protected function getStates($country_id)
    {
        $states = State::with('data')->where('country_id', $country_id)->get();
        return response()->json($states);
    }

    protected function getSectors($state_id)
    {
        $sectors = Sector::with('data')->where('state_id', $state_id)->get();
        return response()->json($sectors);
    }

    protected function getCompanies($sector_id)
    {
        $companies = Company::with('data')->where('sector_id', $sector_id)->get();
        return response()->json($companies);
    }
}
