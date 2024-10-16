<?php

namespace App\Http\Controllers\admin;

use App\Bll\Lang;
use App\Models\About;
use App\Models\Vision;
use App\Models\Language;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Vision\UpdateVisionRequest;

class VisionController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {

        $vision = Vision::first();
        $languags = Language::get();
        $lang_id = Lang::getSelectedLangId();

        return view('admin.vision.edit', compact('vision', 'languags', 'lang_id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVisionRequest $request)
    {
        try {
            DB::beginTransaction();
            $vision = Vision::first();

            if ($vision) {
                $vision->update($request->safe()->merge([
                    'status' => $request->status ?? 0,
                ])->only('status'));


                $vision->data()->updateOrCreate(
                    ['lang_id' => $request->lang_id ?? Lang::getSelectedLangId()],
                    [
                        'training_courses'      => $request->training_courses,
                        'quality_policy'        => $request->quality_policy,
                        'social_responsibility' => $request->social_responsibility,
                        'communication'         => $request->communication,
                    ]
                );

            }
            DB::commit();
            session()->flash('success', __('messages.about_updated_successfully'));
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('custom')->error('Error in AboutController/update Function: ' . $e->getMessage());
            session()->flash('error', __('messages.about_not_updated_successfully'));
            return redirect()->route('admin.abouts.edit');
        }
    }
}
