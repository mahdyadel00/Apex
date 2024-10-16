<?php

namespace App\Http\Traits;
use App\Models\SubPermission;
use App\Models\User;

trait PermissionTrait {

    public function hasPermission(string $permission, string $sub_permission) {
        // User ID
        $user_id = $this->attributes['id'];

        // Permission
        $permission = SubPermission::whereHas('permission', function ($q) use ($permission) {
            $q->where('name', $permission);
        })
            ->has("permissionRole", '=', '1')
            ->where("name", $sub_permission)
            ->with("permissionRole")
            ->first();

        if(!$permission){ return false; }else{ $role_id = $permission->permissionRole->role_id; }
        // If user has role
        $user = User::whereHas('roles', function($q) use(&$role_id) {$q->where('role_id', $role_id);})->find($user_id);
        if(!$user){ return false; }else{ return true; }
    }

}
