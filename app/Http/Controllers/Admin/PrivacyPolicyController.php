<?php

namespace App\Http\Controllers\Admin;

use App\Bll\Lang;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PrivacyPolicy\UpdateRequestPrivacyPolicy;
use App\Models\Language;
use App\Models\PrivacyPolicy;
use App\Models\PrivacyPolicyData;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PrivacyPolicyController extends Controller
{
    public function edit()
    {

        $privacy_policy = PrivacyPolicy::first();
        $languags = Language::get();
        $lang_id = Lang::getSelectedLangId();

        return view('admin.privacy_polices.edit', compact('privacy_policy', 'languags' , 'lang_id'));
    }
    public function update(UpdateRequestPrivacyPolicy $request)
    {
        try{
            DB::beginTransaction();
            $privacy_policy = PrivacyPolicy::first();

            if($privacy_policy){
                $privacy_policy->update($request->safe()->merge([
                    'status' => $request->status ?? 0,
                ])->only('status', 'image'));

                $privacy_policy->data()->updateOrCreate(
                    ['lang_id' => $request->lang_id ?? Lang::getSelectedLangId()],
                    ['title' => $request->title, 'description' => $request->description]
                );

                if(count($request->files) > 0){
                    saveMedia($request, $privacy_policy);
                }

                DB::commit();
                session()->flash('success', __('messages.privacy_policy_updated_successfully'));
                return redirect()->back();
            }
        }catch (\Exception $e){
            DB::rollBack();
            Log::channel('custom')->error('Error in PrivacyPolicyController/update Function: ' . $e->getMessage());
            session()->flash('error', __('messages.privacy_policy_not_updated_successfully'));
            return redirect()->route('admin.privacy_polices.edit');
        }
    }
}
