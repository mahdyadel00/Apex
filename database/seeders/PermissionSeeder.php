<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [

            'users', 'create_user', 'edit_user', 'show_user', 'delete_user',
            'permissions', 'create_permission', 'edit_permission', 'show_permission', 'delete_permission',
            'roles', 'create_role', 'edit_role', 'show_role', 'delete_role',
            'sliders', 'create_slider', 'edit_slider', 'show_slider', 'delete_slider',
            'countries', 'create_country', 'edit_country', 'show_country', 'delete_country',
            'states', 'create_state', 'edit_state', 'show_state', 'delete_state',
            'posts', 'create_post', 'edit_post', 'show_post', 'delete_post',
            'comments', 'create_comment', 'edit_comment', 'show_comment', 'delete_comment',
            'services', 'create_service', 'edit_service', 'show_service', 'delete_service',
            'our_businesses', 'create_our_business', 'edit_our_business', 'show_our_business', 'delete_our_business',
            'teams', 'create_team', 'edit_team', 'show_team', 'delete_team',
            'contacts', 'show_contact', 'delete_contact',
            'settings', 'edit_Setting',
            'abouts', 'edit_about',
            'privacy_polices', 'edit_privacy_policy',
            'terms_conditions', 'edit_terms_condition',


        ];


        foreach ($permissions as $permission) {

            Permission::create(['name' => $permission]);
        }
    }
}
