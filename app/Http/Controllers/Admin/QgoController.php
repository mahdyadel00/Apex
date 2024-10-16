<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Qgo\StoreRequestQgo;
use App\Http\Requests\Admin\Qgo\UpdateRequestQgo;
use App\Models\Qgo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class QgoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $qgos =  Qgo::get();

        return view('admin.qgo.index', compact('qgos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.qgo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequestQgo $request)
    {
        try{
            DB::beginTransaction();

            $qgo = Qgo::create($request->safe()->merge([
                'password' => Hash::make($request->password)
            ])->all());

            DB::commit();
            session()->flash('success', __('messages.created_successfully'));
            return redirect()->route('admin.qgos.index');
        }catch (\Exception $e){
            DB::rollBack();
            Log::channel('stderr')->error($e->getMessage());
            session()->flash('error', __('messages.created_failed'));
            return redirect()->route('admin.qgos.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            $qgo = Qgo::find($id);

            if(!$qgo){
                session()->flash('error', __('messages.not_found'));
                return redirect()->route('admin.qgos.index');
            }

            DB::commit();
            return view('admin.qgo.show', compact('qgo'));
        }catch (\Exception $e) {
            DB::rollBack();
            Log::channel('stderr')->error($e->getMessage());
            session()->flash('error', __('messages.not_found'));
            return redirect()->route('admin.qgos.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            DB::beginTransaction();
            $qgo = Qgo::find($id);

            if(!$qgo){
                session()->flash('error', __('messages.not_found'));
                return redirect()->route('admin.qgos.index');
            }

            DB::commit();
            return view('admin.qgo.edit', compact('qgo'));
        }catch (\Exception $e) {
            DB::rollBack();
            Log::channel('stderr')->error($e->getMessage());
            session()->flash('error', __('messages.not_found'));
            return redirect()->route('admin.qgos.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequestQgo $request, string $id)
    {
        try{
            DB::beginTransaction();
            $qgo = Qgo::find($id);

            if(!$qgo){
                session()->flash('error', __('messages.not_found'));
                return redirect()->route('admin.qgos.index');
            }

            $qgo->update($request->safe()->all());

            DB::commit();
            session()->flash('success', __('messages.updated_successfully'));
            return redirect()->route('admin.qgos.index');
        }catch (\Exception $e){
            DB::rollBack();
            Log::channel('stderr')->error($e->getMessage());
            session()->flash('error', __('messages.updated_failed'));
            return redirect()->route('admin.qgos.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            $qgo = Qgo::find($id);

            if(!$qgo){
                session()->flash('error', __('messages.not_found'));
                return redirect()->route('admin.qgos.index');
            }

            $qgo->delete();

            DB::commit();
            session()->flash('success', __('messages.deleted_successfully'));
            return redirect()->route('admin.qgos.index');
        }catch (\Exception $e){
            DB::rollBack();
            Log::channel('stderr')->error($e->getMessage());
            session()->flash('error', __('messages.deleted_failed'));
            return redirect()->route('admin.qgos.index');
        }
    }
}
