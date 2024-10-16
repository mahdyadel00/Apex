<?php

namespace App\Http\Controllers\Admin;

use App\Bll\Lang;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TermsCondition\UpdateRequestTermsCondition;
use App\Models\Language;
use App\Models\TermsCondition;
use App\Models\TermsConditionData;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TermsConditionController extends Controller
{
    public function edit()
    {

        $terms_condition = TermsCondition::first();
        $languags = Language::get();
        $lang_id = Lang::getSelectedLangId();

        return view('admin.terms_conditions.edit', compact('terms_condition', 'languags' , 'lang_id'));
    }
    public function update(UpdateRequestTermsCondition $request)
    {
        try{
            DB::beginTransaction();
            $terms_condition = TermsCondition::first();

            if($terms_condition){
                $terms_condition->update($request->safe()->merge([
                    'status' => $request->status ?? 0,
                ])->only('status', 'image'));

                $terms_condition->data()->updateOrCreate(
                    ['lang_id' => $request->lang_id ?? Lang::getSelectedLangId()],
                    ['title' => $request->title, 'description' => $request->description]
                );

                if(count($request->files) > 0){
                    saveMedia($request, $terms_condition);
                }

                DB::commit();
                session()->flash('success', __('messages.terms_condition_updated_successfully'));
                return redirect()->back();
            }
        }catch (\Exception $e){
            DB::rollBack();
            dd($e->getMessage());
            Log::channel('custom')->error('Error in TermsConditionController/update Function: ' . $e->getMessage());
            session()->flash('error', __('messages.terms_condition_not_updated_successfully'));
            return redirect()->route('admin.terms_conditions.edit');
        }
    }
}
