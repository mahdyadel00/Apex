<?php

namespace App\Http\Controllers\Frontend;

use App\Bll\Lang;
use App\Http\Controllers\Controller;
use App\Http\Requests\Front\CertificateIntegrity\StoreRequestCertificateIntegrity;
use App\Models\Country;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CertificateIntegrityController extends Controller
{
    public function index()
    {
        $countries  = Country::get();
        $setting  = Setting::with('data')->first();
        $lang_id  = Lang::getSelectedLangId();
        return view('Frontend.certificate_integrity' , compact('countries' , 'setting' , 'lang_id'));
//        return view('layouts.Frontend._thanks');
    }


    protected function store(StoreRequestCertificateIntegrity $request)
    {
        try{
                DB::beginTransaction();

                $certificateIntegrity = \App\Models\CertificateIntegrity::create($request->safe()->all());

            if (count($request->files) > 0) {
                saveMedia($request, $certificateIntegrity);
            }

                DB::commit();
                session()->flash('success' , __('messages.created_successfully'));
                return back();
        }catch (\Exception $ex){
            DB::rollBack();
            Log::channel('custom')->error($ex->getMessage());
            session()->flash('error' , __('messages.failed_to_save_data'));
            return redirect()->route('certificateIntegrity.index');
        }
    }
}
