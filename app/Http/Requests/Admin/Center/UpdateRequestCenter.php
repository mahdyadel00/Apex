<?php

namespace App\Http\Requests\Admin\Center;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequestCenter extends FormRequest
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
            'state_id'      => ['sometimes', 'exists:states,id'],
            'name'          => ['sometimes', 'string', 'max:255'],
            'description'   => ['sometimes', 'string'],
            'is_active'     => ['sometimes', 'boolean'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */

    public function messages(): array
    {
        return [
            'state_id.exists'       => __('messages.state_id_exists' , ['attribute' => __('messages.state_id')]),

            'name.string'           => __('messages.name_string' , ['attribute' => __('messages.name')]),
            'name.max'              => __('messages.name_max' , ['attribute' => __('messages.name')]),
        ];
    }
}
