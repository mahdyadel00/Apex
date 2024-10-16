<?php

namespace App\Http\Controllers\Admin;

use App\Bll\Lang;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Sector\StoreRequestSector;
use App\Http\Requests\Admin\Sector\UpdateRequestSector;
use App\Models\Language;
use App\Models\Sector;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sectors = Sector::get();
        $lang_id = Lang::getSelectedLangId();

        return view('admin.sectors.index', compact('sectors', 'lang_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $states = State::get();
        $lang_id = Lang::getSelectedLangId();

        return view('admin.sectors.create', compact('lang_id', 'states'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequestSector $request)
    {
        try{
            DB::beginTransaction();

            $sector = Sector::create($request->safe()->all());

            $sector->data()->create([
                'lang_id'       => Lang::getSelectedLangId(),
                'name'          => $request->name,
            ]);

            DB::commit();
            session()->flash('success', __('messages.created_successfully'));
            return redirect()->route('admin.sectors.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('stderr')->error($e->getMessage());
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

            $sector = Sector::find($id);

            if(!$sector){
                session()->flash('error', __('messages.not_found'));
                return redirect()->route('admin.sectors.index');
            }

            $lang_id = Lang::getSelectedLangId();

            DB::Commit();
            return view('admin.sectors.show', compact('sector', 'lang_id'));
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('stderr')->error($e->getMessage());
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

            $sector = Sector::find($id);

            if(!$sector){
                session()->flash('error', __('messages.not_found'));
                return redirect()->route('admin.sectors.index');
            }

            $lang_id    = Lang::getSelectedLangId();
            $states     = State::get();
            $languages  = Language::get();
            DB::Commit();
            return view('admin.sectors.edit', compact('sector', 'lang_id', 'states', 'languages'));
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('stderr')->error($e->getMessage());
            session()->flash('error', __('messages.error'));
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequestSector $request, string $id)
    {
        try{
            DB::beginTransaction();

            $sector = Sector::find($id);

            if(!$sector){
                session()->flash('error', __('messages.not_found'));
                return redirect()->route('admin.sectors.index');
            }

            $sector->update($request->safe()->all());

            $sector->data()->updateOrCreate(
                ['lang_id'  => $request->lang_id ?? Lang::getSelectedLangId()],
                ['name'     => $request->name]
            );

            DB::commit();
            session()->flash('success', __('messages.updated_successfully'));
            return redirect()->route('admin.sectors.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('stderr')->error($e->getMessage());
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

            $sector = Sector::find($id);

            if(!$sector){
                session()->flash('error', __('messages.not_found'));
                return redirect()->route('admin.sectors.index');
            }

            $sector->delete();

            DB::commit();
            session()->flash('success', __('messages.deleted_successfully'));
            return redirect()->route('admin.sectors.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('stderr')->error($e->getMessage());
            session()->flash('error', __('messages.error'));
            return redirect()->back();
        }
    }
}
