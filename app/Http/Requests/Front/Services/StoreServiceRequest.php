<?php

namespace App\Http\Requests\Front\Services;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
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

            'name'          =>    ['sometimes', 'string', 'max:255'],
            'phone'         =>    ['sometimes', 'string', 'max:255'],
            'email'         =>    ['sometimes', 'string', 'email', 'max:255' , 'unique:users,email'],
            'password'      =>    ['sometimes', 'string', 'max:255' , 'confirmed'],
            'country_id'    =>    ['required' , 'exists:countries,id'],
            'state_id'      =>    ['required' , 'exists:states,id'],
            'sector_id'     =>    ['required' , 'exists:sectors,id'],
            'company_id'    =>    ['required' , 'exists:companies,id'],
            'information'   =>    ['required', 'array'],
            'information.*' =>    ['required', 'string', 'max:255'],
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
            'name.required'         => __('validation.required' , ['attribute' => __('validation.attributes.name')]),
            'name.string'           => __('validation.string' , ['attribute' => __('validation.attributes.name')]),
            'name.max'              => __('validation.max.string' , ['attribute' => __('validation.attributes.name')]),

            'phone.required'        => __('validation.required' , ['attribute' => __('validation.attributes.phone')]),
            'phone.string'          => __('validation.string' , ['attribute' => __('validation.attributes.phone')]),
            'phone.max'             => __('validation.max.string' , ['attribute' => __('validation.attributes.phone')]),

            'email.required'        => __('validation.required' , ['attribute' => __('validation.attributes.email')]),
            'email.string'          => __('validation.string' , ['attribute' => __('validation.attributes.email')]),
            'email.email'           => __('validation.email' , ['attribute' => __('validation.attributes.email')]),

            'city.required'         => __('validation.required' , ['attribute' => __('validation.attributes.city')]),
            'city.exists'           => __('validation.exists' , ['attribute' => __('validation.attributes.city')]),

            'country.required'      => __('validation.required' , ['attribute' => __('validation.attributes.country')]),
            'country.exists'        => __('validation.exists' , ['attribute' => __('validation.attributes.country')]),

            'state.required'        => __('validation.required' , ['attribute' => __('validation.attributes.state')]),
            'state.exists'          => __('validation.exists' , ['attribute' => __('validation.attributes.state')]),

            'sector.required'       => __('validation.required' , ['attribute' => __('validation.attributes.sector')]),
            'sector.exists'         => __('validation.exists' , ['attribute' => __('validation.attributes.sector')]),

            'company.required'      => __('validation.required' , ['attribute' => __('validation.attributes.company')]),
            'company.exists'        => __('validation.exists' , ['attribute' => __('validation.attributes.company')]),

            'information.required'  => __('validation.required' , ['attribute' => __('validation.attributes.information')]),
            'information.string'    => __('validation.string' , ['attribute' => __('validation.attributes.information')]),
            'information.max'       => __('validation.max.string' , ['attribute' => __('validation.attributes.information')]),
        ];
    }
}
