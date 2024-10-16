<?php

namespace App\Http\Controllers\Admin;

use App\Bll\Lang;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Information\StoreRequestInformation;
use App\Http\Requests\Admin\Information\UpdateRequestInformation;
use App\Models\Information;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $informations = Information::get();
        $lang_id = Lang::getSelectedLangId();
        return view('admin.informations.index', compact('informations', 'lang_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $languags   = Language::get();
        $lang_id    = Lang::getSelectedLangId();
        return view('admin.informations.create', compact('languags', 'lang_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequestInformation $request)
    {
        // dd($request->all());
        try {
            DB::beginTransaction();
            $information = Information::create($request->safe()->merge([
                'is_active' => $request->is_active ?? '0',
            ])->all());

            $information->data()->create([
                'title'         => $request->title,
                'description'   => $request->description,
                'lang_id'       => $request->lang_id,
            ]);
            // dd($information);
            if (count($request->files) > 0) {
                saveMedia($request, $information);
            }

            DB::commit();
            session()->flash('success', __('messages.information_created_successfully'));
            return redirect()->route('admin.informations.index');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            Log::channel('website')->error('error in informationController@store: ' . $e->getMessage() . ' at Line: ' . $e->getLine() . ' in File: ' . $e->getFile());
            session()->flash('error', __('messages.error'));
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            DB::beginTransaction();
            $information = Information::find($id);
            if(!$information){
                session()->flash('error', __('messages.information_not_found'));
                return redirect()->back();
            }
            $lang_id = Lang::getSelectedLangId();
            DB::Commit();
            return view('admin.informations.show', compact('information', 'lang_id'));
        }catch(\Exception $e){
            Log::channel('website')->error('error in informationController@show: ' . $e->getMessage() . ' at Line: ' . $e->getLine() . ' in File: ' . $e->getFile());
            session()->flash('error', __('messages.error'));
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
            $information = Information::find($id);
            if(!$information){
                session()->flash('error', __('messages.information_not_found'));
                return redirect()->back();
            }
            $languags   = Language::get();
            $lang_id    = Lang::getSelectedLangId();
            DB::Commit();
            return view('admin.informations.edit', compact('information', 'languags', 'lang_id'));
        }catch(\Exception $e){
            Log::channel('website')->error('error in informationController@edit: ' . $e->getMessage() . ' at Line: ' . $e->getLine() . ' in File: ' . $e->getFile());
            session()->flash('error', __('messages.error'));
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequestInformation $request, string $id)
    {
        try{
            DB::beginTransaction();
            $information = Information::find($id);
            if(!$information){
                session()->flash('error', __('messages.information_not_found'));
                return redirect()->back();
            }
            $information->update($request->safe()->merge([
                'is_active' => $request->is_active ?? '0',
            ])->all());

            $information->data()->updateOrCreate([
               'information_id' => $information->id,
                'lang_id' => Lang::getSelectedLangId(),
            ],[
                'title' => $request->title,
                'description' => $request->description,
            ]);
            if (count($request->files) > 0) {
                saveMedia($request, $information);
            }

            DB::Commit();
            session()->flash('success', __('messages.information_updated_successfully'));
            return redirect()->route('admin.informations.index');
        }catch(\Exception $e){
            DB::rollBack();
            Log::channel('website')->error('error in informationController@update: ' . $e->getMessage() . ' at Line: ' . $e->getLine() . ' in File: ' . $e->getFile());
            session()->flash('error', __('messages.error'));
            return redirect()->back();
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            DB::beginTransaction();
            $information = Information::find($id);
            if(!$information){
                session()->flash('error', __('messages.information_not_found'));
                return redirect()->back();
            }
            $information->delete();
            DB::Commit();
            session()->flash('success', __('messages.information_deleted_successfully'));
            return redirect()->route('admin.informations.index');
        }catch(\Exception $e){
            DB::rollBack();
            Log::channel('website')->error('error in informationController@destroy: ' . $e->getMessage() . ' at Line: ' . $e->getLine() . ' in File: ' . $e->getFile());
            session()->flash('error', __('messages.error'));
            return redirect()->back();
        }
    }
}
