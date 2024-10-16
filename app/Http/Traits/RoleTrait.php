<?php

namespace App\Http\Traits;

use App\Models\Role;
use App\Http\Traits\PermissionTrait;
use App\Models\RoleUser;
use App\Models\SubPermission;
use App\Models\User;

trait RoleTrait
{
    protected function roleId($role)
    {
        if (is_string($role) || is_int($role)) {
            $role = Role::whereName($role)->orWhere("id", $role)->first();
            $role_id = ($role) ? $role->id : false;
        } else {
            $role_id = ($role) ? $role->attributes['id'] : false;
        }

        return $role_id;
    }

    public function attachRole(mixed $role): bool
    {
        if ($role) {
            RoleUser::firstOrCreate(
                ['user_id' => $this->attributes['id'], 'role_id' => $this->roleId($role)],
                ['user_id' => $this->attributes['id'], 'role_id' => $this->roleId($role)]);

            return true;
        }

        return false;
    }

    public function detachRole(mixed $role): bool
    {
        if ($role) {
            RoleUser::where(["user_id" => $this->attributes['id'], "role_id" => $this->roleId($role)])->delete();
            return true;
        }

        return false;
    }

    public function hasRole(mixed $role): bool
    {
        if ($role) {
            if (RoleUser::where(["user_id" => $this->attributes['id'], "role_id" => $this->roleId($role)])->exists()) {
                return true;
            }

            return false;
        }

        return false;
    }

    public function hasPermission(string $permission, string $sub_permission)
    {
        return auth()->user()->roles()->whereHas('subPermissions', function ($query) use ($permission, $sub_permission) {
            $query->whereRelation('permission', 'name', $permission)->where("name", $sub_permission);
        })->exists();
    }
}
