<?php

namespace App\Http\Controllers\Admin;

use App\Bll\Lang;
use App\Http\Controllers\Controller;
use App\Models\StudentSystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StudentSystemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student_systems = StudentSystem::get();
        $lang_id = Lang::getSelectedLangId();
        return view('admin.student_systems.index', compact('student_systems', 'lang_id'));
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
        try{
            DB::beginTransaction();
            $student_system = StudentSystem::find($id);
            if(!$student_system){
                session()->flash('error', __('message.not_found_data'));
                return redirect()->back()->with('error', __('admin.not_found_data'));
            }
            $lang_id = Lang::getSelectedLangId();
            DB::commit();
            return view('admin.student_systems.show', compact('student_system', 'lang_id'));
        }catch (\Exception $ex) {
            DB::rollBack();
            Log::channel('custom')->error('file: ' . $ex->getFile() . 'line: ' . $ex->getLine() . 'message: ' . $ex->getMessage() . 'trace: ' . $ex->getTraceAsString());
            return redirect()->back()->with('error', __('admin.something_went_wrong'));
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
            $student_system = StudentSystem::find($id);
            if(!$student_system){
                session()->flash('error', __('message.not_found_data'));
                return redirect()->back()->with('error', __('admin.not_found_data'));
            }
            $student_system->delete();
            $student_system->media()->delete();
            DB::commit();
            session()->flash('success', __('message.deleted_successfully'));
            return redirect()->back()->with('success', __('admin.deleted_successfully'));
        }catch (\Exception $ex) {
            DB::rollBack();
            Log::channel('custom')->error('file: ' . $ex->getFile() . 'line: ' . $ex->getLine() . 'message: ' . $ex->getMessage() . 'trace: ' . $ex->getTraceAsString());
            return redirect()->back()->with('error', __('admin.something_went_wrong'));
        }
    }
}
