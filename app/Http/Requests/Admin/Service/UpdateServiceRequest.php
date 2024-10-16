<?php

namespace App\Http\Requests\Admin\Service;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceRequest extends FormRequest
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

            'name'              => ['sometimes', 'string', 'max:255'],
            'email'             => ['sometimes', 'string', 'email', 'max:255'],
            'phone'             => ['sometimes', 'string', 'max:255'],
            'city_id'           => ['sometimes', 'exists:cities,id'],
            'company_id'        => ['sometimes', 'exists:companies,id'],
            'information'       => ['sometimes', 'string'],
            'information_price' => ['sometimes', 'string'],
            'useful'            => ['sometimes', 'boolean'],
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
            'name.string'       => __('validation.string', ['attribute' => __('validation.attributes.name')]),
            'name.max'          => __('validation.max.string', ['attribute' => __('validation.attributes.name'), 'max' => 255]),

            'email.string'      => __('validation.string', ['attribute' => __('validation.attributes.email')]),
            'email.email'       => __('validation.email', ['attribute' => __('validation.attributes.email')]),

            'phone.string'      => __('validation.string', ['attribute' => __('validation.attributes.phone')]),
            'phone.max'         => __('validation.max.string', ['attribute' => __('validation.attributes.phone'), 'max' => 255]),

            'city_id.exists'    => __('validation.exists', ['attribute' => __('validation.attributes.city_id')]),

            'company_id.exists' => __('validation.exists', ['attribute' => __('validation.attributes.company_id')]),

            'information.string' => __('validation.string', ['attribute' => __('validation.attributes.information')]),

            'information_price.string' => __('validation.string', ['attribute' => __('validation.attributes.information_price')]),

            'useful.boolean'    => __('validation.boolean', ['attribute' => __('validation.attributes.useful')]),
        ];


    }
}
