<?php

namespace App\Http\Requests\Front\StepSystem;

use App\Rules\Media;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequestStepSystem extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'country_id'                =>  ['required' , 'exists:countries,id'],
            'center_name'               =>  ['required' , 'string' , 'max:255'],
            'controller_name'           =>  ['required' , 'string' , 'max:255'],
            'phone'                      =>  ['required' , 'string' , 'max:255'],
            'lab_name'                  =>  ['required' , 'string' , 'max:255'],
            'id_number'                 =>  ['required' , 'string' , 'max:255'],
            'name_ar'                   =>  ['required' , 'string' , 'max:255'],
            'name_en'                   =>  ['required' , 'string' , 'max:255'],
            'grades'                    =>  ['required' , 'string' , 'max:255'],
            'writing_grade'             =>  ['nullable' , 'string' , 'max:255'],
            'reading_grade'             =>  ['nullable' , 'string' , 'max:255'],
            'listening_grade'           =>  ['nullable' , 'string' , 'max:255'],
            'estimates'                 =>  ['nullable' , 'string' , 'max:255'],
            'notes'                     =>  ['nullable' , 'string' , 'max:255'],
            'id_image'                  =>  [new Media],
            'person_image'              =>  [new Media],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */

    public function messages(): array
    {
        return [
            'country_id.required'               =>  __('messages.country_id_required' , ['attribute' => __('messages.country_id')]),
            'country_id.exists'                 =>  __('messages.country_id_exists' , ['attribute' => __('messages.country_id')]),

            'center_name.required'              =>  __('messages.center_name_required' , ['attribute' => __('messages.center_name')]),
            'center_name.string'                =>  __('messages.center_name_string' , ['attribute' => __('messages.center_name')]),
            'center_name.max'                   =>  __('messages.center_name_max' , ['attribute' => __('messages.center_name')]),

            'controller_name.required'          =>  __('messages.controller_name_required' , ['attribute' => __('messages.controller_name')]),
            'controller_name.string'            =>  __('messages.controller_name_string' , ['attribute' => __('messages.controller_name')]),
            'controller_name.max'               =>  __('messages.controller_name_max' , ['attribute' => __('messages.controller_name')]),
//
            'phone.required'                     =>  __('messages.phone_required' , ['attribute' => __('messages.phone')]),
            'phone.string'                       =>  __('messages.phone_string' , ['attribute' => __('messages.phone')]),
            'phone.max'                          =>  __('messages.phone_max' , ['attribute' => __('messages.phone')]),

            'lab_name.required'                 =>  __('messages.lab_name_required' , ['attribute' => __('messages.lab_name')]),
            'lab_name.string'                   =>  __('messages.lab_name_string' , ['attribute' => __('messages.lab_name')]),
            'lab_name.max'                      =>  __('messages.lab_name_max' , ['attribute' => __('messages.lab_name')]),

            'id_number.required'                =>  __('messages.id_number_required' , ['attribute' => __('messages.id_number')]),
            'id_number.string'                  =>  __('messages.id_number_string' , ['attribute' => __('messages.id_number')]),
            'id_number.max'                     =>  __('messages.id_number_max' , ['attribute' => __('messages.id_number')]),

            'name_ar.required'                  =>  __('messages.name_ar_required' , ['attribute' => __('messages.name_ar')]),
            'name_ar.string'                    =>  __('messages.name_ar_string' , ['attribute' => __('messages.name_ar')]),
            'name_ar.max'                       =>  __('messages.name_ar_max' , ['attribute' => __('messages.name_ar')]),

            'name_en.required'                  =>  __('messages.name_en_required' , ['attribute' => __('messages.name_en')]),
            'name_en.string'                    =>  __('messages.name_en_string' , ['attribute' => __('messages.name_en')]),
            'name_en.max'                       =>  __('messages.name_en_max' , ['attribute' => __('messages.name_en')]),

            'grades.required'                   =>  __('messages.grades_required' , ['attribute' => __('messages.grades')]),
            'grades.string'                     =>  __('messages.grades_string' , ['attribute' => __('messages.grades')]),
            'grades.max'                        =>  __('messages.grades_max' , ['attribute' => __('messages.grades')]),

            'writing_grade.string'              =>  __('messages.writing_grade_string' , ['attribute' => __('messages.writing_grade')]),
            'writing_grade.max'                 =>  __('messages.writing_grade_max' , ['attribute' => __('messages.writing_grade')]),

            'reading_grade.string'              =>  __('messages.reading_grade_string' , ['attribute' => __('messages.reading_grade')]),
            'reading_grade.max'                 =>  __('messages.reading_grade_max' , ['attribute' => __('messages.reading_grade')]),

            'listening_grade.string'            =>  __('messages.listening_grade_string' , ['attribute' => __('messages.listening_grade')]),
            'listening_grade.max'               =>  __('messages.listening_grade_max' , ['attribute' => __('messages.listening_grade')]),

            'estimates.string'                  =>  __('messages.estimates_string' , ['attribute' => __('messages.estimates')]),
            'estimates.max'                     =>  __('messages.estimates_max' , ['attribute' => __('messages.estimates')]),

            'notes.string'                      =>  __('messages.notes_string' , ['attribute' => __('messages.notes')]),
            'notes.max'                         =>  __('messages.notes_max' , ['attribute' => __('messages.notes')]),
        ];

        }
}
