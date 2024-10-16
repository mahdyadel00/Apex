<?php

namespace App\Http\Controllers\Admin;

use App\Bll\Lang;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Country\StoreRequestCountry;
use App\Http\Requests\Admin\Country\UpdateRequestCountry;
use App\Models\Country;
use App\Models\Language;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countries = Country::get();
        $lang_id = Lang::getSelectedLangId();

        return view('admin.countries.index', compact('countries', 'lang_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lang_id = Lang::getSelectedLangId();

        return view('admin.countries.create', compact('lang_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequestCountry $request)
    {
        try {
            DB::beginTransaction();
            $country = Country::create($request->safe()->merge([
                'is_active' => $request->is_active ?? '0',
            ])->all());
            $country->data()->create([
                'name'      => $request->name,
                'lang_id'   => Lang::getSelectedLangId(),
            ]);

            DB::commit();
            session()->flash('success', __('messages.country_created_successfully'));
            return redirect()->route('admin.countries.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('state')->error($e->getMessage());
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
            $country = Country::find($id);

            if(!$country){
                session()->flash('error', __('messages.country_not_found'));
                return redirect()->back();
            }

            $lang_id = Lang::getSelectedLangId();

            DB::commit();
            return view('admin.countries.show', compact('country', 'lang_id'));
        }catch(\Exception $e){
            DB::rollBack();
            Log::channel('country')->error($e->getMessage());
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
            $country = Country::find($id);

            if(!$country){
                session()->flash('error', __('messages.country_not_found'));
                return redirect()->back();
            }

            $lang_id = Lang::getSelectedLangId();
            $languags   = Language::get();

            DB::commit();
            return view('admin.countries.edit', compact('country', 'lang_id', 'languags'));
        }catch (\Exception $e) {
            DB::rollBack();
            Log::channel('country')->error($e->getMessage());
            session()->flash('error', __('messages.error'));
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequestCountry $request, string $id)
    {
        try{
            DB::beginTransaction();
            $country = Country::find($id);

            if(!$country){
                session()->flash('error', __('messages.country_not_found'));
                return redirect()->back();
            }

            $country->update($request->safe()->merge([
                'is_active' => $request->is_active ?? '0',
            ])->all());

            $country->data()->updateOrCreate([
                'country_id' => $country->id,
                'lang_id'    => Lang::getSelectedLangId(),
            ],[
                'name'       => $request->name,
            ]);

            DB::commit();
            session()->flash('success', __('messages.country_updated_successfully'));
            return redirect()->route('admin.countries.index');
        }catch (\Exception $e) {
            DB::rollBack();
            Log::channel('country')->error($e->getMessage());
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
            $country = Country::find($id);

            if(!$country){
                session()->flash('error', __('messages.country_not_found'));
                return redirect()->back();
            }

            $country->delete();
            $country->data()->delete();

            DB::commit();
            session()->flash('success', __('messages.country_deleted_successfully'));
            return redirect()->route('admin.countries.index');
        }catch (\Exception $e) {
            DB::rollBack();
            Log::channel('country')->error($e->getMessage());
            session()->flash('error', __('messages.error'));
            return redirect()->back();

        }
    }
}
