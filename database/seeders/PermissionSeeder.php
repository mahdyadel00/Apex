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
            'students', 'create_student', 'edit_student', 'show_student', 'delete_student',
            'appointments', 'create_appointment', 'edit_appointment', 'show_appointment', 'delete_appointment',
            'permissions', 'create_permission', 'edit_permission', 'show_permission', 'delete_permission',
            'roles', 'create_role', 'edit_role', 'show_role', 'delete_role',
            'sliders', 'create_slider', 'edit_slider', 'show_slider', 'delete_slider',
            'countries', 'create_country', 'edit_country', 'show_country', 'delete_country',
            'states', 'create_state', 'edit_state', 'show_state', 'delete_state',
            'sectors', 'create_sector', 'edit_sector', 'show_sector', 'delete_sector',
            'quizzes', 'create_quiz', 'edit_quiz', 'show_quiz', 'delete_quiz',
            'centers', 'create_center', 'edit_center', 'show_center', 'delete_center',
            'categories', 'create_category', 'edit_category', 'show_category', 'delete_category',
            'posts', 'create_post', 'edit_post', 'show_post', 'delete_post',
            'comments', 'create_comment', 'edit_comment', 'show_comment', 'delete_comment',
            'certificate_integrity', 'create_certificate_integrity', 'edit_certificate_integrity', 'show_certificate_integrity', 'delete_certificate_integrity',
            'step_systems', 'create_step_system', 'edit_step_system', 'show_step_system', 'delete_step_system',
            'student_systems', 'create_student_system', 'edit_student_system', 'show_student_system', 'delete_student_system',
            'testimonials', 'create_testimonial', 'edit_testimonial', 'show_testimonial', 'delete_testimonial',
            'companies', 'create_company', 'edit_company', 'show_company', 'delete_company',
            'informations' , 'create_information', 'edit_information', 'show_information', 'delete_information',
            'services', 'create_service', 'edit_service', 'show_service', 'delete_service',
            'qgos', 'create_qgo', 'edit_qgo', 'show_qgo', 'delete_qgo',
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
