<?php

namespace App\Http\Controllers\Admin;

use App\Bll\Lang;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Company\StoreRequestComapny;
use App\Http\Requests\Admin\Company\UpdateRequestComapny;
use App\Models\Company;
use App\Models\Sector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies  = Company::get();
        $lang_id    = Lang::getSelectedLangId();

        return view('admin.companies.index', compact('companies', 'lang_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sectors    = Sector::get();
        $lang_id    = Lang::getSelectedLangId();

        return view('admin.companies.create', compact('lang_id', 'sectors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequestComapny $request)
    {
        try {
            DB::beginTransaction();
            $company = Company::create($request->safe()->merge([
                'password'  => Hash::make($request->password),
            ])->all());
            $company->data()->create([
                'name'      => $request->name,
                'lang_id'   => Lang::getSelectedLangId(),
            ]);

            if (count($request->files) > 0) {
                saveMedia($request, $company);
            }

            DB::commit();
            session()->flash('success', __('messages.company_created_successfully'));
            return redirect()->route('admin.companies.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('state')->error($e->getMessage());
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
            $company = Company::find($id);

            if ($company) {
                $lang_id = Lang::getSelectedLangId();
                return view('admin.companies.show', compact('company', 'lang_id'));
            } else {
                session()->flash('error', __('messages.company_not_found'));
                return redirect()->back();
            }

        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('state')->error($e->getMessage());
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
            $company = Company::find($id);

            if ($company) {
                $lang_id = Lang::getSelectedLangId();
                $sectors = Sector::get();
                return view('admin.companies.edit', compact('company', 'lang_id', 'sectors'));
            } else {
                session()->flash('error', __('messages.company_not_found'));
                return redirect()->back();
            }

        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('state')->error($e->getMessage());
            session()->flash('error', __('messages.error'));
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequestComapny $request, string $id)
    {
        try {
            DB::beginTransaction();
            $company = Company::find($id);

            if ($company) {
                $company->update($request->safe()->except('password'));

                $company->data()->updateOrCreate([
                    'lang_id'   => Lang::getSelectedLangId(),
                ], [
                    'name'      => $request->name,
                ]);

                if (count($request->files) > 0) {
                    saveMedia($request, $company);
                }

                DB::commit();
                session()->flash('success', __('messages.company_updated_successfully'));
                return redirect()->route('admin.companies.index');
            } else {
                session()->flash('error', __('messages.company_not_found'));
                return redirect()->back();
            }

        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('state')->error($e->getMessage());
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
            $company = Company::find($id);

            if ($company) {
                $company->delete();
                DB::commit();
                session()->flash('success', __('messages.company_deleted_successfully'));
                return redirect()->route('admin.companies.index');
            } else {
                session()->flash('error', __('messages.company_not_found'));
                return redirect()->back();
            }

        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('state')->error($e->getMessage());
            session()->flash('error', __('messages.error'));
            return redirect()->back();
        }
    }

    /**
     * change company password
     */
    public function changePassword(Request $request,$id)
    {
        try{
            DB::beginTransaction();
            $company = Company::find($id);

            if ($company) {

                return view('admin.companies.change_password', compact('company'));
            }

        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('state')->error($e->getMessage());
            session()->flash('error', __('messages.error'));
            return redirect()->back();
        }
    }

    /**
     * update company password
     */

    public function updatePassword(Request $request,$id)
    {
        try{
            DB::beginTransaction();
            $company = Company::find($id);

            if ($company) {
                $company->update([
                    'password'  => Hash::make($request->password),
                ]);
                DB::commit();
                session()->flash('success', __('messages.company_password_updated_successfully'));
                return redirect()->route('admin.companies.index');
            } else {
                session()->flash('error', __('messages.company_not_found'));
                return redirect()->back();
            }

        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('state')->error($e->getMessage());
            session()->flash('error', __('messages.error'));
            return redirect()->back();
        }
    }
}
