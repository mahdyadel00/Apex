<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Student\StoreStudentRequest;
use App\Http\Requests\Admin\Student\UpdateStudentRequest;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return view('admin.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        try {
            DB::beginTransaction();
            $student = Student::create($request->safe()->merge([
                'password' => Hash::make($request->password),
                'serial_number'   => rand(100000, 999999),
            ])->all());

            if (count($request->files) > 0) {
                saveMedia($request, $student);
            }
            DB::commit();
            session()->flash('success', __('messages.created_successfully'));
            return redirect()->route('admin.students.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('website')->error('error in studentController@store: ' . $e->getMessage() . ' at Line: ' . $e->getLine() . ' in File: ' . $e->getFile());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $student = Student::find($student->id);
        return view('admin.students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $student = Student::find($student->id);
        return view('admin.students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $student = Student::where('id', $id)->first();
            if ($student != null) {
                $student->update($request->safe()->all());

                if (count($request->files) > 0) {
                    saveMedia($request, $student);
                }

                DB::commit();
                session()->flash('success', __('messages.updated_successfully'));
                return redirect()->route('admin.students.index');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('website')->error('error in studentController@update: ' . $e->getMessage() . ' at Line: ' . $e->getLine() . ' in File: ' . $e->getFile());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        session()->flash('success', __('messages.deleted_successfully'));
        return redirect()->route('admin.students.index');
    }
    public function uploadFile(Request $request , $id)
    {
        try{
            DB::beginTransaction();
            $student = Student::find($id);

            if(!$student){
                session()->flash('error', __('messages.not_found'));
                return response()->json(['message' => 'Student not found'], 404);
            }
            DB::commit();
            return view('admin.students.upload_certificate', compact('student'));
        }catch (\Exception $e) {
            DB::rollBack();
            Log::channel('website')->error('error in studentController@uploadFile: ' . $e->getMessage() . ' at Line: ' . $e->getLine() . ' in File: ' . $e->getFile());
            return redirect()->back();
        }
    }

    public function storeFile(Request $request , $id)
    {
        try{
            DB::beginTransaction();
            $student = Student::find($id);

            if(!$student){
                session()->flash('error', __('messages.not_found'));
                return response()->json(['message' => 'Student not found'], 404);
            }
            if (count($request->files) > 0) {
                saveMedia($request, $student);
            }
            DB::commit();
            session()->flash('success', __('messages.created_successfully'));
            return redirect()->route('admin.students.index');
        }catch (\Exception $e) {
            DB::rollBack();
            Log::channel('website')->error('error in studentController@storeFile: ' . $e->getMessage() . ' at Line: ' . $e->getLine() . ' in File: ' . $e->getFile());
            return redirect()->back();
        }
    }
}
