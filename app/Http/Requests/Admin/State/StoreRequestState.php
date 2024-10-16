<?php

namespace App\Http\Requests\Admin\State;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequestState extends FormRequest
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
            'country_id'    => ['required', 'exists:countries,id'],
            'name'          => ['required', 'string', 'max:255'],
            'is_active'     => ['sometimes', 'boolean'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */

    public function messages(): array

    {
        return [
            'country_id.required'     =>  __('validation.required', ['attribute' => __('dashboard.country')]),
            'country_id.exists'       =>  __('validation.exists', ['attribute' => __('dashboard.country')]),

            'name.required'           =>  __('validation.required', ['attribute' => __('dashboard.name')]),
            'name.string'             =>  __('validation.string', ['attribute' => __('dashboard.name')]),
            'name.max'                =>  __('validation.max.string', ['attribute' => __('dashboard.name')]),

            'is_active.required'      =>  __('validation.required', ['attribute' => __('dashboard.is_active')]),
            'is_active.boolean'       =>  __('validation.boolean', ['attribute' => __('dashboard.is_active')]),


            ];
    }
}
