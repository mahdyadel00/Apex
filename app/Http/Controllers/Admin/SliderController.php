<?php

namespace App\Http\Controllers\Admin;

use App\Bll\Lang;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Slider\StoreRequestSlider;
use App\Http\Requests\Admin\Slider\UpdateRequestSlider;
use App\Models\Language;
use App\Models\Slider;
use App\Models\SliderData;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::with('data')->get();
        $lang_id = Lang::getSelectedLangId();

        return view('admin.sliders.index', compact('sliders' , 'lang_id'));
    }

    public function create()
    {
        $languags = Language::get();

        return view('admin.sliders.create', compact('languags'));
    }

    protected function store(StoreRequestSlider $request)
    {
        try{
            DB::beginTransaction();
            $slider = Slider::create($request->safe()->merge([
                'status' => $request->status ?? 0,
            ])->all());

            if ($slider){
                $slider->data()->create([
                    'title'         => $request->title,
                    'description'   => $request->description,
                    'lang_id'       => Lang::getSelectedLangId(),
                ]);
            }
            if(count($request->files) > 0){
                saveMedia($request, $slider);
            }
            DB::commit();
            session()->flash('success', __('messages.slider_created_successfully'));
            return redirect()->route('admin.sliders.index');
        }catch(\Exception $e){
            DB::rollBack();
            Log::channel('admin')->error('error in SliderController@store: ' . $e->getMessage() . ' at Line: ' . $e->getLine() . ' in File: ' . $e->getFile());
            session()->flash('error', __('messages.added_failed'));
        }
    }
    protected function show($id)
    {
        $slider = Slider::with('data')->where('id', $id)->first();
        $lang_id = Lang::getSelectedLangId();

        return view('admin.sliders.show', compact('slider' , 'lang_id'));
    }
    public function edit($id)
    {
        $slider = Slider::where('id', $id)->first();
        $lang_id = Lang::getSelectedLangId();
        $languags = Language::get();

        return view('admin.sliders.edit', compact('slider', 'languags' , 'lang_id'));
    }
    public function update(UpdateRequestSlider $request, $id)
    {
       try{
           DB::beginTransaction();
           $slider = Slider::where('id', $id)->first();
           if ($slider){
               $slider->update($request->safe()->merge([
                   'status' => $request->status ?? 0,
               ])->only('status', 'image'));

               $slider->data()->updateOrCreate([
                   'lang_id'       => $request->lang_id ?? Lang::getSelectedLangId(),
               ],[
                   'title'         => $request->title,
                   'description'   => $request->description,
               ]);
           }
           if(count($request->files) > 0){
               saveMedia($request, $slider);
           }
           DB::commit();
           session()->flash('success', __('messages.slider_updated_successfully'));
           return redirect()->route('admin.sliders.index');
       }catch(\Exception $e){
           DB::rollBack();
           Log::channel('admin')->error('error in SliderController@update: ' . $e->getMessage() . ' at Line: ' . $e->getLine() . ' in File: ' . $e->getFile());
           return redirect()->back()->withInput()->withErrors(['error' => __('messages.updated_failed')]);
       }
    }
    public function destroy($id)
    {
        try{
            DB::beginTransaction();
            $slider = Slider::where('id', $id)->first();
            if ($slider){
                $slider->delete();
                $slider->data()->delete();
                $slider->media()->delete();
            }
            DB::commit();
            session()->flash('error', __('messages.slider_deleted_successfully'));
            return redirect()->route('admin.sliders.index');
        }catch(\Exception $e){
            DB::rollBack();
            Log::channel('admin')->error('error in SliderController@destroy: ' . $e->getMessage() . ' at Line: ' . $e->getLine() . ' in File: ' . $e->getFile());
            session()->flash('error', __('messages.deleted_failed'));
        }
    }
}
