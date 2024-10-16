<?php

namespace App\Http\Requests\Admin\Quiz;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequestQuiz extends FormRequest
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

            'name'         => ['sometimes', 'string', 'max:255'],
            'description'  => ['sometimes', 'string'],
            'is_active'    => ['sometimes', 'boolean'],
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
            'name.string'               => __('messages.name_string' , ['attribute' => __('messages.name')]),
            'name.max'                  => __('messages.name_max' , ['attribute' => __('messages.name')]),

            'description.string'        => __('messages.description_string' , ['attribute' => __('messages.description')]),
            'description.max'           => __('messages.description_max' , ['attribute' => __('messages.description')]),

            'is_active.boolean'         => __('messages.is_active_boolean' , ['attribute' => __('messages.is_active')]),
        ];
    }
}
