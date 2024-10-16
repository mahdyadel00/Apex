<?php

namespace App\Http\Controllers\Admin;

use App\Bll\Lang;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Service\UpdateServiceRequest;
use App\Models\City;
use App\Models\Company;
use App\Models\Language;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::get();
        $lang_id = Lang::getSelectedLangId();

        return view('admin.services.index', compact('services', 'lang_id'));
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

            $service = Service::find($id);
            $lang_id = Lang::getSelectedLangId();

            if(!$service) {
                session()->flash('error', __('messages.service_not_found'));
                return redirect()->route('admin.services.index');
            }

            DB::commit();
            return view('admin.services.show', compact('service', 'lang_id'));
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('stderr')->error($e->getMessage());
            session()->flash('error', __('messages.error'));
            return redirect()->route('admin.services.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try{
            DB::beginTransaction();

            $service = Service::find($id);
            $lang_id = Lang::getSelectedLangId();
            $cities = City::get();
            $companies = Company::get();

            if(!$service) {
                session()->flash('error', __('messages.service_not_found'));
                return redirect()->route('admin.services.index');
            }

            DB::commit();
            return view('admin.services.edit', compact('service', 'lang_id', 'cities', 'companies'));
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('stderr')->error($e->getMessage());
            session()->flash('error', __('messages.error'));
            return redirect()->route('admin.services.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceRequest $request, string $id)
    {
        try{
            DB::beginTransaction();

            $service = Service::find($id);

            if(!$service) {
                session()->flash('error', __('messages.service_not_found'));
                return redirect()->route('admin.services.index');
            }

            $service->update($request->safe()->all());

            DB::commit();
            session()->flash('success', __('messages.success_updated_service'));
            return redirect()->route('admin.services.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('stderr')->error($e->getMessage());
            session()->flash('error', __('messages.error'));
            return redirect()->route('admin.services.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            DB::beginTransaction();

            $service = Service::find($id);

            if(!$service) {
                session()->flash('error', __('messages.service_not_found'));
                return redirect()->route('admin.services.index');
            }

            $service->delete();

            DB::commit();
            session()->flash('success', __('messages.service_deleted'));
            return redirect()->route('admin.services.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('stderr')->error($e->getMessage());
            session()->flash('error', __('messages.error'));
            return redirect()->route('admin.services.index');
        }
    }
}
