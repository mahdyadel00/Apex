<?php

namespace App\Http\Controllers\Admin;

use App\Bll\Lang;
use App\Http\Controllers\Controller;
use App\Models\CertificateIntegrity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CertificateIntegrityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $certificate_integrities = CertificateIntegrity::get();
        $lang_id                 = Lang::getSelectedLangId();
        return view('admin.certificate_integrities.index', compact('certificate_integrities', 'lang_id'));
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
            $certificate_integrity = CertificateIntegrity::find($id);

            if(!$certificate_integrity){
                session()->flash('error',  __('messages.certificate_integrity.not_found'));
                return redirect()->route('admin.certificate_integrities.index')->with(['error' => 'هذا الشهادة غير موجودة']);
            }

            $lang_id = Lang::getSelectedLangId();

            DB::commit();
            return view('admin.certificate_integrities.show', compact('certificate_integrity', 'lang_id'));
        }catch (\Exception $ex) {
            DB::rollBack();
            Log::channel('custom')->error('Error in CertificateIntegrityController/show '. $ex->getMessage());
            session()->flash('error', __('messages.certificate_integrity.not_found'));
            return redirect()->route('admin.certificate_integrities.index')->with(['error' => 'هذا الشهادة غير موجودة']);
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
            $certificate_integrity = CertificateIntegrity::find($id);

            if(!$certificate_integrity){
                session()->flash('error', __('messages.certificate_integrity_not_found'));
                return redirect()->route('admin.certificate_integrity.index')->with(['error' => 'هذا الشهادة غير موجودة']);
            }

            $certificate_integrity->delete();
            $certificate_integrity->media()->delete();

            DB::commit();
            session()->flash('success', __('messages.certificate_integrity_deleted_successfully'));
            return redirect()->route('admin.certificate_integrity.index')->with(['success' => 'تم حذف الشهادة بنجاح']);
        }catch (\Exception $ex) {
            DB::rollBack();
            Log::channel('custom')->error('Error in CertificateIntegrityController/destroy '. $ex->getMessage());
            session()->flash('error', __('messages.certificate_integrity_not_found'));
            return redirect()->route('admin.certificate_integrity.index')->with(['error' => 'هذا الشهادة غير موجودة']);
        }
    }
}
