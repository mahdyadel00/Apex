<?php

namespace App\Http\Controllers\Admin;

use App\Bll\Lang;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Testimonial\UpdateRequestTestimonials;
use App\Models\Language;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function edit()
    {

        $testimonial        = Testimonial::first();
        $languags           = Language::get();
        $lang_id            = Lang::getSelectedLangId();

        return view('admin.testimonials.edit', compact('testimonial', 'languags', 'lang_id'));
    }

    public function update(UpdateRequestTestimonials $request)
    {
//        dd($request->all());
        try {
            DB::beginTransaction();
           $testimonials = Testimonial::first();

            if ($testimonials) {
                $testimonials->update($request->safe()->merge([
                    'status' => $request->status ?? 0,
                ])->all());


                $testimonials->data()->updateOrCreate(
                    [
                        'lang_id'           => $request->lang_id ?? Lang::getSelectedLangId(),
                        'testimonial_id'    => $testimonials->id,
                    ],
                    [
                        'title'         => $request->title,
                        'description'   => $request->description,
                        'new_title'        => $request->new_title,
                        'new_description'  => $request->new_description,
                    ]);

                if (count($request->files) > 0) {
                    saveMedia($request, $testimonials);
                }
            }
            DB::commit();
            session()->flash('success', __('messages.testimonials_updated_successfully'));
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('custom')->error('Error in TestimonialController/update Function: ' . $e->getMessage());
            dd($e->getMessage());
            session()->flash('error', __('messages.testimonials_not_updated_successfully'));
            return redirect()->route('admin.testimonials.edit');
        }
    }
}
