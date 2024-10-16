<?php

namespace App\Http\Controllers\Frontend;

use App\Bll\Lang;
use App\Http\Controllers\Controller;
use App\Http\Requests\Front\StudentSystem\StoreRequestStudentSystem;
use App\Models\Setting;
use App\Models\StudentSystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StudentSystemController extends Controller
{
    protected function index()
    {
        $setting = Setting::with('data')->first();
        $lang_id = Lang::getSelectedLangId();
        return view('Frontend.student_system', compact('setting', 'lang_id'));
        // return view('layouts.Frontend._thanks');

    }


    protected function store(StoreRequestStudentSystem $request)
    {
        try {
            DB::beginTransaction();

            $student_system = StudentSystem::create($request->safe()->all());

            if (count($request->files) > 0) {
                saveMedia($request, $student_system);
            }

            DB::commit();
            session()->flash('success', __('messages.created_successfully'));
            return back();

        } catch (\Exception $ex) {
            DB::rollback();
            Log::channel('custom')->error('File: ' . $ex->getFile() . ' Line: ' . $ex->getLine() . ' Message: ' . $ex->getMessage());
            session()->flash('error', __('messages.failed_to_save'));
            return back();
        }
    }

}
