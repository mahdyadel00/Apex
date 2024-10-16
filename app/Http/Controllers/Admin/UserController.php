<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequestUser;
use App\Http\Requests\Admin\User\UpdateRequestUser;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('id', '!=', 2)->get();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequestUser $request)
    {
        try {
            DB::beginTransaction();
            $user = User::create($request->safe()->merge(['password' => Hash::make($request->password)])->all());
            if ($request->has('roles_name')) {
                $user->assignRole($request->roles_name);
            }
            if (count($request->files) > 0) {
                saveMedia($request, $user);
            }
            DB::commit();
            session()->flash('success', __('messages.user_created_successfully'));
            return redirect()->route('admin.users.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('website')->error('error in UserController@store: ' . $e->getMessage() . ' at Line: ' . $e->getLine() . ' in File: ' . $e->getFile());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public
    function show(string $id)
    {
        $user = User::where('id', $id)->first();

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public
    function edit(string $id)
    {
        $user = User::where('id', $id)->first();
        $roles = Role::pluck('name', 'name')->all();
        if ($user != null) {
            return view('admin.users.edit', compact('user', 'roles'));
        } else {
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public
    function update(UpdateRequestUser $request, $id)
    {
        try {
            DB::beginTransaction();
            $user = User::where('id', $id)->first();
            if ($user != null) {
                $user->update($request->safe()->all());
                if ($request->has('roles_name')) {
                    $user->syncRoles($request->roles_name);
                }
                if (count($request->files) > 0) {
                    saveMedia($request, $user);
                }
                DB::commit();
                session()->flash('success', __('messages.user_updated_successfully'));
                return redirect()->route('admin.users.index');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('website')->error('error in UserController@update: ' . $e->getMessage() . ' at Line: ' . $e->getLine() . ' in File: ' . $e->getFile());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public
    function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            $user = User::where('id', $id)->first();
            if ($user != null) {
                $user->delete();
                $user->roles()->detach();
                $user->media()->delete();
                DB::commit();
                session()->flash('error', __('messages.user_deleted_successfully'));
                return redirect()->route('admin.users.index');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('website')->error('error in UserController@destroy: ' . $e->getMessage() . ' at Line: ' . $e->getLine() . ' in File: ' . $e->getFile());
            return redirect()->back();
        }
    }
}
