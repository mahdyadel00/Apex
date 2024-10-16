<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'), ['title' => __('dashboard.roles')]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $role = Role::create(['name' => $request->name]);
        foreach ($request->groups as $key => $value) {

            $role->givePermissionTo($value);
        }
        session()->flash('success', __('messages.created_successfully'));
        return redirect()->route('admin.roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::where('id', $id)->first();
        $permissions = Permission::all();
        // $languages = Language::get();
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $role = Role::findOrFail($id);

        $role->name = $request->input('name');
        $role->save();

        $permissions = $request->input('permissions');
        $role->syncPermissions($permissions);

        $users = $role->users()->get();
        foreach ($users as $user) {
            $user->syncPermissions($permissions);
        }
        session()->flash('success', __('messages.updated_successfully'));
        return redirect()->route('admin.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::with('users')->find($id);

        if ($role->users->isNotEmpty()) {

            session()->flash('error', __('role is in use!'));
            return response()
                ->json(['error' => __('role is in use!')]);
        }
        $role->delete();
        session()->flash('error', __('dashboard.deleted_successfully'));
        return redirect()->route('admin.roles.index');
    }
}
