<?php

namespace App\Http\Requests\Front\StudentSystem;

use App\Rules\Media;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequestStudentSystem extends FormRequest
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
            'education_name'        => ['required', 'string', 'max:255'],
            'band_name'             => ['required', 'string', 'max:255'],
            'ranking'               => ['required', 'string', 'max:255'],
            'grading_data'          => ['required', 'string', 'max:255'],
            'person_name'           => ['required', 'string', 'max:255'],
            'person_phone'          => ['required', 'string', 'max:255'],
            'person_image'          => [new Media],
            'school_logo'           => [new Media],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */

    public function messages(): array
    {
        return [
            'education_name.required'       => __('messages.education_name_required' , ['attribute' => __('messages.education_name')]),
            'education_name.string'         => __('messages.education_name_string' , ['attribute' => __('messages.education_name')]),
            'education_name.max'            => __('messages.education_name_max' , ['attribute' => __('messages.education_name')]),

            'band_name.required'            => __('messages.band_name_required' , ['attribute' => __('messages.band_name')]),
            'band_name.string'              => __('messages.band_name_string' , ['attribute' => __('messages.band_name')]),
            'band_name.max'                 => __('messages.band_name_max' , ['attribute' => __('messages.band_name')]),

            'ranking.required'              => __('messages.ranking_required' , ['attribute' => __('messages.ranking')]),
            'ranking.string'                => __('messages.ranking_string' , ['attribute' => __('messages.ranking')]),
            'ranking.max'                   => __('messages.ranking_max' , ['attribute' => __('messages.ranking')]),

            'grading_data.required'         => __('messages.grading_data_required' , ['attribute' => __('messages.grading_data')]),
            'grading_data.string'           => __('messages.grading_data_string' , ['attribute' => __('messages.grading_data')]),
            'grading_data.max'              => __('messages.grading_data_max' , ['attribute' => __('messages.grading_data')]),
        ];
    }
}
