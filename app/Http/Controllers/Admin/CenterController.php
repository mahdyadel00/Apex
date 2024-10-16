<?php

namespace App\Http\Controllers\Admin;

use App\Bll\Lang;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Center\StoreRequestCenter;
use App\Http\Requests\Admin\Center\UpdateRequestCenter;
use App\Models\Center;
use App\Models\Language;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CenterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $centers = Center::get();
        $lang_id = Lang::getSelectedLangId();

        return view('admin.centers.index', compact('centers', 'lang_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lang_id    = Lang::getSelectedLangId();
        $states     = State::get();
        return view('admin.centers.create', compact('lang_id', 'states'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequestCenter $request)
    {
        try{
           DB::beginTransaction();

              $center = Center::create($request->safe()->merge([
                'is_active' => $request->is_active ?? '0',
              ])->all());

                $center->data()->create([
                    'name'              => $request->name,
                    'description'       => $request->description,
                    'lang_id'           => Lang::getSelectedLangId(),
                ]);

                DB::commit();
                session()->flash('success', __('messages.center_created_successfully'));
                return redirect()->route('admin.centers.index');
        }catch (\Exception $ex) {
            DB::rollback();
            Log::channel('custom')->error('Error CenterController@store: ' . $ex->getMessage());
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

            $center = Center::find($id);

            if(!$center){
                session()->flash('error', __('messages.center_not_found'));
                return redirect()->back();
            }

            $lang_id = Lang::getSelectedLangId();

            DB::commit();
            return view('admin.centers.show', compact('center', 'lang_id'));
        }catch (\Exception $ex) {
            DB::rollback();
            Log::channel('custom')->error('Error CenterController@show: ' . $ex->getMessage());
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

            $center = Center::find($id);

            if(!$center){
                session()->flash('error', __('messages.center_not_found'));
                return redirect()->back();
            }

            $lang_id = Lang::getSelectedLangId();
            $languags  = Language::get();
            $states     = State::get();

            DB::commit();
            return view('admin.centers.edit', compact('center', 'lang_id', 'languags', 'states'));
        }catch (\Exception $ex) {
            DB::rollback();
            Log::channel('custom')->error('Error CenterController@edit: ' . $ex->getMessage());
            session()->flash('error', __('messages.error'));
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequestCenter $request, string $id)
    {
        try{
            DB::beginTransaction();

            $center = Center::find($id);

            if(!$center){
                session()->flash('error', __('messages.center_not_found'));
                return redirect()->back();
            }

            $center->update($request->safe()->merge([
                'is_active' => $request->is_active ?? '0',
            ])->all());

            $center->data()->update([
                'name'              => $request->name,
                'description'       => $request->description,
                'lang_id'           => Lang::getSelectedLangId() ?? $center->data->lang_id,
            ]);

            DB::commit();
            session()->flash('success', __('messages.center_updated_successfully'));
            return redirect()->route('admin.centers.index');
        }catch (\Exception $ex) {
            DB::rollback();
            dd($ex->getMessage());
            Log::channel('custom')->error('Error CenterController@update: ' . $ex->getMessage());
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

            $center = Center::find($id);

            if(!$center){
                session()->flash('error', __('messages.center_not_found'));
                return redirect()->back();
            }

            $center->delete();

            DB::commit();
            session()->flash('success', __('messages.center_deleted_successfully'));
            return redirect()->route('admin.centers.index');
        }catch (\Exception $ex) {
            DB::rollback();
            Log::channel('custom')->error('Error CenterController@destroy: ' . $ex->getMessage());
            session()->flash('error', __('messages.error'));
            return redirect()->back();
        }
    }
}
