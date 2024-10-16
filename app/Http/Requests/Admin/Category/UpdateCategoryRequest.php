<?php

namespace App\Http\Requests\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'category_id'    => ['sometimes', 'integer', 'exists:countries,id'],
            'is_active'     => ['sometimes', 'boolean'],
            'name'          => ['sometimes', 'string', 'max:255'],

        ];
    }


    /**
     * Get the error messages for the defined validation rules.
     */

    public function messages(): array

        {
            return [
                'name.required'           =>  __('validation.required', ['attribute' => __('dashboard.name')]),
                'name.string'             =>  __('validation.string', ['attribute' => __('dashboard.name')]),
                'name.max'                =>  __('validation.max.string', ['attribute' => __('dashboard.name')]),

                'country_id.required'     =>  __('validation.required', ['attribute' => __('dashboard.country')]),
                'country_id.integer'      =>  __('validation.integer', ['attribute' => __('dashboard.country')]),
                'country_id.exists'       =>  __('validation.exists', ['attribute' => __('dashboard.country')]),

                'is_active.required'      =>  __('validation.required', ['attribute' => __('dashboard.is_active')]),
                'is_active.boolean'       =>  __('validation.boolean', ['attribute' => __('dashboard.is_active')]),


                ];
        }
}
