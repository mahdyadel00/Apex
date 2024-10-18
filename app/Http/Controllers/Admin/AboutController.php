<?php

namespace App\Http\Controllers\Admin;

use App\Bll\Lang;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\About\UpdateRequestAbout;
use App\Models\Language;
use App\Models\About;
use App\Models\AboutData;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AboutController extends Controller
{
    public function edit()
    {

        $about = About::first();
        $languags = Language::get();
        $lang_id = Lang::getSelectedLangId();

        return view('admin.abouts.edit', compact('about', 'languags', 'lang_id'));
    }

    public function update(UpdateRequestAbout $request)
    {
        try {
            DB::beginTransaction();
            $about = About::first();

            if ($about) {
                $about->update($request->safe()->merge([
                    'status' => $request->status ?? 0,
                ])->only('status', 'image'));


                $about->data()->update(
                    ['lang_id'          => $request->lang_id ?? Lang::getSelectedLangId()],
                    [
                        'title'         => $request->title,
                        'description'   => $request->description,
                        'history'       => $request->history,
                        'objectives'    => $request->objectives,
                    ]
                );

                if (count($request->files) > 0) {
                    saveMedia($request, $about);
                }
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
