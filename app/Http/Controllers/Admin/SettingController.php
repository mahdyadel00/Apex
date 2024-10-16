<?php

namespace App\Http\Controllers\Admin;

use App\Bll\Lang;
use App\Models\{Language, Setting, SettingData};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Setting\UpdateRequestSetting;
use Illuminate\Support\Facades\{DB, Log};

class SettingController extends Controller
{
    public function edit()
    {

        $setting = Setting::with('data')->first();
        $languags = Language::get();
        $lang_id = Lang::getSelectedLangId();

        return view('admin.settings.edit', compact('setting', 'languags' , 'lang_id'));
    }

    public function update(UpdateRequestSetting $request)
    {

        try {
            DB::BeginTransaction();

            $setting = Setting::first();

            $setting->update($request->except('name', 'description', 'address', 'lang_id', 'setting_id'));

            $setting->data()->updateOrCreate(
                ['lang_id' => $request->lang_id ?? Lang::getSelectedLangId()
                ],[
                    'name'          => $request->name,
                    'description'   => $request->description,
                    'address'       => $request->address,
                ]

            );

            if (count($request->files) > 0) {
                saveMedia($request, $setting);
            }

            DB::commit();
            session()->flash('success', __('messages.settings_updated_successfully'));
            return redirect()->route('admin.settings.edit');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            Log::channel('admin')->error('error in SettingController@update: ' . $e->getMessage() . ' at Line: ' . $e->getLine() . ' in File: ' . $e->getFile());
            return redirect()->back()->with('error', __('messages.updated_failed'));
        }
    }
}
