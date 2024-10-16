<?php

namespace App\Http\Controllers\Admin;

use App\Bll\Lang;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\State\StoreRequestState;
use App\Http\Requests\Admin\State\UpdateRequestState;
use App\Models\Country;
use App\Models\Language;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $states = State::get();
        $lang_id = Lang::getSelectedLangId();

        return view('admin.states.index', compact('states', 'lang_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::get();
        $lang_id = Lang::getSelectedLangId();

        return view('admin.states.create', compact('lang_id', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequestState $request)
    {

        try {
            DB::beginTransaction();
            $state = State::create($request->safe()->merge([
                'is_active' => $request->is_active ?? '0',
            ])->all());


            $state->data()->create([
                'name'      => $request->name,
                'lang_id'   => Lang::getSelectedLangId(),
            ]);

            DB::commit();
            session()->flash('success', __('messages.state_created_successfully'));
            return redirect()->route('admin.states.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('website')->error('error in StateController@store: ' . $e->getMessage() . ' at Line: ' . $e->getLine() . ' in File: ' . $e->getFile());
            session()->flash('error', __('messages.error'));
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            DB::beginTransaction();
            $state = State::find($id);
            $lang_id = Lang::getSelectedLangId();
            if (!$state) {
                session()->flash('error', __('messages.state_not_found'));
                return redirect()->route('admin.states.index');
            }
            DB::commit();
            return view('admin.states.show', compact('state' , 'lang_id'));
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('website')->error('error in StateController@show: ' . $e->getMessage() . ' at Line: ' . $e->getLine() . ' in File: ' . $e->getFile());
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            DB::beginTransaction();
            $state      = State::find($id);
            $languags   = Language::get();
            $lang_id    = Lang::getSelectedLangId();
            $countries  = Country::get();
            if (!$state) {
                session()->flash('error', __('messages.state_not_found'));
                return redirect()->route('admin.states.index');
            }
            DB::commit();
            return view('admin.states.edit', compact('state', 'languags' , 'lang_id', 'countries'));
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('website')->error('error in StateController@edit: ' . $e->getMessage() . ' at Line: ' . $e->getLine() . ' in File: ' . $e->getFile());
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequestState $request, string $id)
    {
        try {
            DB::beginTransaction();
            $state = State::find($id);
            if (!$state) {
                session()->flash('error', __('messages.state_not_found'));
                return redirect()->route('admin.states.index');
            }
            $state->update($request->safe()->only([
                'country_id',
                'is_active',
            ]));

            $state->data()->updateOrCreate([
                'state_id'  => $state->id,
                'lang_id'   => $request->lang_id ??  Lang::getSelectedLangId(),
            ], [
                'name'      => $request->name,
            ]);

            DB::commit();
            session()->flash('success', __('messages.state_updated_successfully'));
            return redirect()->route('admin.states.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('website')->error('error in StateController@update: ' . $e->getMessage() . ' at Line: ' . $e->getLine() . ' in File: ' . $e->getFile());
            session()->flash('error', __('messages.error'));
            return redirect()->back();
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            $state = State::find($id);
            if (!$state) {
                session()->flash('error', __('messages.state_not_found'));
                return redirect()->route('admin.states.index');
            }
            $state->delete();
            DB::commit();
            session()->flash('success', __('messages.state_deleted_successfully'));
            return redirect()->route('admin.states.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('website')->error('error in StateController@destroy: ' . $e->getMessage() . ' at Line: ' . $e->getLine() . ' in File: ' . $e->getFile());
            session()->flash('error', __('messages.error'));
            return redirect()->back();
        }
    }
}
