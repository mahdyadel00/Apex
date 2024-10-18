<?php

namespace App\Http\Controllers\Admin;

use App\Bll\Lang;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OurBusiness\StoreBusniessRequest;
use App\Http\Requests\Admin\OurBusiness\UpdateBusniessRequest;
use App\Models\Language;
use App\Models\OurBusiness;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OurBusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $our_businesses = OurBusiness::get();
        $lang_id        = Lang::getSelectedLangId();

        return view('admin.our_business.index', compact('our_businesses', 'lang_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.our_business.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBusniessRequest $request)
    {
      try{
          DB::beginTransaction();

            $our_business = OurBusiness::create($request->safe()->all());
            $our_business->data()->create($request->safe()->merge([
                'lang_id' => Lang::getSelectedLangId()
            ])->all());

          if (count($request->files) > 0) {
              saveMedia($request , $our_business);
          }

            DB::commit();
            session()->flash('success', __('messages.success_created_our_business'));
            return redirect()->route('admin.our_businesses.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('error')->error($e->getMessage());
            session()->flash('error', __('messages.error_created_our_business'));
            return redirect()->back();
      }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try{
            DB::beginTransaction();
            $our_business = OurBusiness::find($id);

            if(!$our_business){
                session()->flash('error', __('messages.error_our_business_not_found'));
                return redirect()->route('admin.our_business.index');
            }

            $lang_id    = Lang::getSelectedLangId();
            $languages = Language::get();

            DB::commit();
            return view('admin.our_business.edit', compact('our_business', 'lang_id', 'languages'));

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            session()->flash('error', __('messages.error'));
            return redirect()->route('admin.our_business.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBusniessRequest $request, string $id)
    {
        try{
            DB::beginTransaction();

            $our_business = OurBusiness::find($id);

            if(!$our_business){
                session()->flash('error', __('messages.error_our_business_not_found'));
                return redirect()->route('admin.our_business.index');
            }

            $our_business->update($request->safe()->all());
            $our_business->data()->update($request->safe()->merge([
                'lang_id' => $request->lang_id ?? Lang::getSelectedLangId()
            ])->all());

            if (count($request->files) > 0) {
                saveMedia($request , $our_business);
            }

            DB::commit();
            session()->flash('success', __('messages.success_updated_our_business'));
            return redirect()->route('admin.our_business.index');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            Log::error($e->getMessage());
            session()->flash('error', __('messages.error'));
            return redirect()->route('admin.our_business.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            DB::beginTransaction();

            $our_business = OurBusiness::find($id);

            if(!$our_business){
                session()->flash('error', __('messages.error_our_business_not_found'));
                return redirect()->route('admin.our_businesses.index');
            }

            $our_business->delete();

            DB::commit();
            session()->flash('success', __('messages.success_deleted_our_business'));
            return redirect()->route('admin.our_businesses.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            session()->flash('error', __('messages.error'));
            return redirect()->route('admin.our_businesses.index');
        }
    }
}
