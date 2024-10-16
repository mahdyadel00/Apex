<?php

namespace App\Http\Controllers\Frontend;

use App\Bll\Lang;
use App\Models\Country;
use App\Models\Setting;
use App\Models\StepSystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\Front\StepSystem\StoreRequestStepSystem;

class StepSystemController extends Controller
{
    public function index()
    {
        $countries = Country::get();
        $setting = Setting::with('data')->first();
        $lang_id = Lang::getSelectedLangId();
        return view('Frontend.step_system', compact('countries', 'setting', 'lang_id'));
        // return view('layouts.Frontend._thanks');
    }


    protected function store(StoreRequestStepSystem $request)
    {
        try {
            DB::beginTransaction();

            $step_system = StepSystem::create($request->safe()->all());

            if (count($request->files) > 0) {
                saveMedia($request, $step_system);
            }

            DB::commit();
            session()->flash('success', __('messages.created_successfully'));
            return back();
        } catch (\Exception $ex) {
            DB::rollBack();
            Log::channel('custom')->error('StepSystemController/store Error', ['error' => $ex->getMessage()]);
            return redirect()->back()->with(['error' => $ex->getMessage()]);
        }
    }


}
