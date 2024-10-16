<?php

namespace App\Http\Requests\Admin\Qgo;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequestQgo extends FormRequest
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
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255'],
            'phone'     => ['required', 'string', 'max:255'],
            'password'  => ['required', 'string', 'min:8', 'confirmed'],
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
            'name.required'     => __('Name is required' ,  ['attribute' => __('Name')]),
            'name.string'       => __('Name must be a string' ,  ['attribute' => __('Name')]),
            'name.max'          => __('Name must not be greater than 255 characters' ,  ['attribute' => __('Name')]),

            'email.required'    => __('Email is required' ,  ['attribute' => __('Email')]),
            'email.string'      => __('Email must be a string' ,  ['attribute' => __('Email')]),
            'email.email'       => __('Email must be a valid email address' ,  ['attribute' => __('Email')]),
            'email.max'         => __('Email must not be greater than 255 characters' ,  ['attribute' => __('Email')]),

            'phone.required'    => __('Phone is required' ,  ['attribute' => __('Phone')]),
            'phone.string'      => __('Phone must be a string' ,  ['attribute' => __('Phone')]),
            'phone.max'         => __('Phone must not be greater than 255 characters' ,  ['attribute' => __('Phone')]),

            'password.required' => __('Password is required' ,  ['attribute' => __('Password')]),
            'password.string'   => __('Password must be a string' ,  ['attribute' => __('Password')]),
            'password.min'      => __('Password must be at least 8 characters' ,  ['attribute' => __('Password')]),

        ];
    }
}
