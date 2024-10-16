<?php

namespace App\Http\Controllers\Admin;

use App\Bll\Lang;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Appointment\StoreAppointmentRequest;
use App\Http\Requests\Admin\Appointment\UpdateAppointmentRequest;
use App\Models\Appointment;
use App\Models\Center;
use App\Models\Quiz;
use App\Models\State;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments   = Appointment::all();
        $lang_id = Lang::getSelectedLangId();
        return view('admin.appointments.index', compact('appointments', 'lang_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $states = State::get();
        $centers = Center::get();
        $quizzes = Quiz::get();
        $lang_id = Lang::getSelectedLangId();
        return view('admin.appointments.create', compact('states', 'lang_id', 'centers', 'quizzes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAppointmentRequest $request)
    {
        // dd($request->all());
        try {
            DB::beginTransaction();
            $appointment = Appointment::create($request->safe()->all());

            DB::commit();
            session()->flash('success', __('messages.created_successfully'));
            return redirect()->route('admin.appointments.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('custom')->error('Error in AppointmentController@store: ' . $e->getMessage());
            return redirect()->route('admin.appointments.index')->with('error', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        $appointment = Appointment::find($appointment->id);

        $lang_id = Lang::getSelectedLangId();
        return view('admin.appointments.show', compact('appointment', 'lang_id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        $appointment = Appointment::find($appointment->id);
        $states = State::get();
        $centers = Center::get();
        $quizzes = Quiz::get();
        $lang_id = Lang::getSelectedLangId();
        return view('admin.appointments.edit', compact('appointment', 'states', 'lang_id', 'centers', 'quizzes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAppointmentRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $appointment = Appointment::where('id', $id)->first();
            if ($appointment != null) {
                $appointment->update($request->safe()->all());

                DB::commit();
                session()->flash('success', __('messages.updated_successfully'));
                return redirect()->route('admin.appointments.index');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('website')->error('error in AppointmentController@update: ' . $e->getMessage() . ' at Line: ' . $e->getLine() . ' in File: ' . $e->getFile());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        session()->flash('success', __('messages.deleted_successfully'));
        return redirect()->route('admin.appointments.index');
    }
}
