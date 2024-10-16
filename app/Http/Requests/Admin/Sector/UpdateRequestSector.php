<?php

namespace App\Http\Requests\Admin\Sector;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequestSector extends FormRequest
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
            'state_id'  => ['sometimes', 'integer' , 'exists:states,id'],
            'lang_id'   => ['sometimes', 'integer' , 'exists:languages,id'],
            'name'      => ['sometimes', 'string', 'max:255'],
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
            'state_id.integer'  => __('validation.integer' , ['attribute' => __('validation.attributes.state_id')]),
            'state_id.exists'   => __('validation.exists' , ['attribute' => __('validation.attributes.state_id')]),

            'lang_id.integer'  => __('validation.integer' , ['attribute' => __('validation.attributes.lang_id')]),
            'lang_id.exists'   => __('validation.exists' , ['attribute' => __('validation.attributes.lang_id')]),

            'name.string'   => __('validation.string' , ['attribute' => __('validation.attributes.name')]),
            'name.max'      => __('validation.max.string' , ['attribute' => __('validation.attributes.name')]),
        ];
    }
}
