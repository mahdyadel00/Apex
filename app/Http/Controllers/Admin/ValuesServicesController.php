<?php

namespace App\Http\Controllers\Admin;

use App\Bll\Lang;
use App\Models\Language;
use App\Models\ValuesServices;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ValuesServices\StoreValuesServicesRequest;
use App\Http\Requests\Admin\ValuesServices\UpdateValuesServicesRequest;

class ValuesServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $valuesServices = ValuesServices::with('data')->get();
        $lang_id        = Lang::getSelectedLangId();
        return view('admin.values_services.index', compact('valuesServices', 'lang_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $languags   = Language::get();
        $lang_id    = Lang::getSelectedLangId();
        return view('admin.values_services.create', compact('languags', 'lang_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreValuesServicesRequest $request)
    {
//         dd($request->all());
        try{
            DB::beginTransaction();
            $valuesService = ValuesServices::create($request->safe()->merge([
                'status' => $request->status ?? 0,
            ])->all());

            if ($valuesService){
                $valuesService->data()->create([
                    'title'         => $request->title,
                    'description'   => $request->description,
                    'lang_id'       => $request->lang_id,
                ]);
            }
            if(count($request->files) > 0){
                saveMedia($request, $valuesService);
            }
            DB::commit();
            session()->flash('success', __('messages.created_successfully'));
            return redirect()->route('admin.value-services.index');
        }catch(\Exception $e){
            DB::rollBack();
            dd($e->getMessage());
            Log::channel('admin')->error('error in ValuesServicesController@store: ' . $e->getMessage() . ' at Line: ' . $e->getLine() . ' in File: ' . $e->getFile());
            session()->flash('error', __('messages.added_failed'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $valuesService = ValuesServices::with('data')->where('id', $id)->first();
        $lang_id = Lang::getSelectedLangId();

        return view('admin.values_services.show', compact('valuesService' , 'lang_id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ValuesServices $valuesServices)
    {
        $languags = Language::get();
        $lang_id = Lang::getSelectedLangId();
        $valuesService = ValuesServices::first();
        return view('admin.values_services.edit', compact('valuesService', 'languags', 'lang_id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateValuesServicesRequest $request, $id)
    {
        // dd($request->all());
        try{
            DB::beginTransaction();
            $valuesService = ValuesServices::where('id', $id)->first();
            if ($valuesService){
                $valuesService->update($request->safe()->merge([
                    'status' => $request->status ?? 0,
                ])->only('status', 'image'));

                $valuesService->data()->updateOrCreate([
                    'lang_id'       => $request->lang_id ?? Lang::getSelectedLangId(),
                ],[
                    'title'         => $request->title,
                    'description'   => $request->description,
                ]);
            }
            if(count($request->files) > 0){
                saveMedia($request, $valuesService);
            }
            DB::commit();
            session()->flash('success', __('messages.updated_successfully'));
            return redirect()->route('admin.value-services.index');
        }catch(\Exception $e){
            DB::rollBack();
            // dd($e->getMessage());
            Log::channel('admin')->error('error in ValuesServicesController@update: ' . $e->getMessage() . ' at Line: ' . $e->getLine() . ' in File: ' . $e->getFile());
            return redirect()->back()->withInput()->withErrors(['error' => __('messages.updated_failed')]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            DB::beginTransaction();
            $valuesService = ValuesServices::where('id', $id)->first();
            if ($valuesService){
                $valuesService->delete();
            }

            $valuesService->delete();
            $valuesService->data()->delete();
            $valuesService->media()->delete();

            DB::commit();
            session()->flash('success', __('messages.deleted_successfully'));
            return redirect()->route('admin.value-services.index');
        }catch (\Exception $e){
            DB::rollBack();
            Log::channel('admin')->error('error in ValuesServicesController@destroy: ' . $e->getMessage() . ' at Line: ' . $e->getLine() . ' in File: ' . $e->getFile());
            session()->flash('error', __('messages.deleted_failed'));
            return redirect()->back();
        }
    }
}
