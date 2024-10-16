<?php

namespace App\Http\Controllers\Frontend;

use App\Bll\Lang;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Language;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $setting        = Setting::with('data')->first();
        $languags       = Language::get();
        $company        = Company::find(Auth::guard('company')->id());
        $lang_id        = Lang::getSelectedLangId();

        return view('Frontend.companies.profile', compact('company', 'languags', 'setting', 'lang_id'));
    }

    public function updateProfile(Request $request)
    {
        try{
            DB::beginTransaction();
            $company = Company::find(Auth::guard('company')->id());

            if(!$company){
                session()->flash('error', 'Company not found');
                return redirect()->back();
            }

            $company->update([
                'email'         => $request->email,
                'phone'         => $request->phone,
            ]);

            if(count($request->files) > 0){
                saveMedia($request , $company);
            }

            DB::commit();
            session()->flash('success', 'Company updated successfully');
            return redirect()->back();
        }catch(\Exception $e){
            DB::rollBack();
            Log::channel('custom')->error('Error in update company profile: '.$e->getMessage());
            session()->flash('error', 'Something went wrong');
            return redirect()->back();
        }
    }


    public function edit($id)
    {
        $setting        = Setting::with('data')->first();
        $languags       = Language::get();
        $service        = Service::where('company_id' , Auth::guard('company')->id())->find($id);
        $lang_id        = Lang::getSelectedLangId();

        return view('Frontend.companies.edit', compact('service', 'languags', 'setting', 'lang_id'));
    }


    public  function update(Request $request, $id)
    {
        try{
            DB::beginTransaction();
            $service = Service::where('company_id' , Auth::guard('company')->id())->find($id);


            if(!$service){
                session()->flash('error', 'Company not found');
                return redirect()->back();
            }

            $service->update([
                'company_id'            => $service->company_id,
                'information'           => $request->information,
                'information_price'     => $request->information_price,

            ]);

            if(count($request->files) > 0){
                saveMedia($request , $service);
            }

            DB::commit();
            session()->flash('success', 'Company updated successfully');
            return redirect()->route('company.edit', $id);
        }catch(\Exception $e){
            DB::rollBack();
            Log::channel('custom')->error('Error in update company profile: '.$e->getMessage());
            session()->flash('error', 'Something went wrong');
            return redirect()->back();
        }
    }


    public function destroy($id)
    {
        try{
            DB::beginTransaction();
            $service = Service::where('company_id' , Auth::guard('company')->id())->find($id);

            if(!$service){
                session()->flash('error', 'Company not found');
                return redirect()->back();
            }

            $service->delete();
            DB::commit();
            session()->flash('success', 'Company deleted successfully');
            return redirect()->back();
        }catch(\Exception $e){
            DB::rollBack();
            Log::channel('custom')->error('Error in delete company profile: '.$e->getMessage());
            session()->flash('error', 'Something went wrong');
            return redirect()->back();
        }
    }

}
