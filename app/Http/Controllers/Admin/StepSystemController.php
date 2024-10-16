<?php

namespace App\Http\Controllers\Admin;

use App\Bll\Lang;
use App\Http\Controllers\Controller;
use App\Models\StepSystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StepSystemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lang_id = Lang::getSelectedLangId();
        $step_systems = StepSystem::get();
        return view('admin.step_systems.index', compact('lang_id', 'step_systems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            DB::beginTransaction();
            $step_system = StepSystem::find($id);

            if (!$step_system) {
                session()->flash('error', __('admin.not_found'));
                return redirect()->route('admin.step_systems.index');
            }
            $lang_id = Lang::getSelectedLangId();
            return view('admin.step_systems.show', compact('step_system', 'lang_id'));
        } catch (\Exception $ex) {
            DB::rollBack();
            Log::channel('custom')->error('file: ' . $ex->getFile() . ' line: ' . $ex->getLine() . ' message: ' . $ex->getMessage());
            session()->flash('error', __('admin.error'));
            return redirect()->route('admin.step_systems.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            DB::beginTransaction();
            $step_system = StepSystem::find($id);
            if (!$step_system) {
                session()->flash('error', __('admin.not_found'));
                return redirect()->route('admin.step_systems.index');
            }
            $step_system->delete();
            $step_system->nedia()->delete();
            DB::commit();
            session()->flash('success', __('admin.deleted_successfully'));
            return redirect()->route('admin.step_systems.index');
        }catch (\Exception $ex){
            DB::rollBack();
            Log::channel('custom')->error('file: '.$ex->getFile().' line: '.$ex->getLine().' message: '.$ex->getMessage());
            session()->flash('error', __('admin.error'));
            return redirect()->route('admin.step_systems.index');
        }
    }
}
