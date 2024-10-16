<?php

namespace Database\Seeders;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([

            'first_name'              => "Super",
            'last_name'               => "Admin",
            'user_name'               => "super admin",
            'birth_date'              => "2023-06-01",
            'roles_name'              => "owner",
            'email'                   => "admin@email.com",
            'password'                => Hash::make('password'),
            'email_verified_at'       => now(),
            'phone'                   => "0123456789",
            'pin_code'                => "123456",
            'address'                 => "address",
        ]);
        $user_2 = User::create([

            'first_name'              => "Mahdy",
            'last_name'               => "Adel",
            'user_name'               => "mahdyadel",
            'birth_date'              => "1996-10-03",
            'roles_name'              => "owner",
            'email'                   => "mahdyadel@email.com",
            'password'                => Hash::make('mahdy@1031996'),
            'email_verified_at'       => now(),
            'phone'                   => "01122907742",
            'pin_code'                => "123456",
            'address'                 => "address",
        ]);



        $role = Role::create(['name' => 'super_admin']);
        // $role_vendor = Role::create(['name' => 'vendor']);


        $permissions = Permission::pluck('id','id')->all();


        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
        $user_2->assignRole([$role->id]);
    }
}
