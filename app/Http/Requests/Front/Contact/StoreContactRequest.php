<?php

namespace App\Http\Requests\Front\Contact;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
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
            'phone'     => ['required', 'string', 'max:255' , 'min:10' , 'regex:/^([0-9\s\-\+\(\)]*)$/'],
            'message'   => ['required', 'string'],
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
            'name.required'     => __('validation.required' , ['attribute' => __('validation.attributes.name')]),
            'name.string'       => __('validation.string' , ['attribute' => __('validation.attributes.name')]),
            'name.max'          => __('validation.max.string' , ['attribute' => __('validation.attributes.name')]),

            'email.required'    => __('validation.required' , ['attribute' => __('validation.attributes.email')]),
            'email.string'      => __('validation.string' , ['attribute' => __('validation.attributes.email')]),
            'email.email'       => __('validation.email' , ['attribute' => __('validation.attributes.email')]),
            'email.max'         => __('validation.max.string' , ['attribute' => __('validation.attributes.email')]),

            'phone.required'    => __('validation.required' , ['attribute' => __('validation.attributes.phone')]),
            'phone.string'      => __('validation.string' , ['attribute' => __('validation.attributes.phone')]),
            'phone.max'         => __('validation.max.string' , ['attribute' => __('validation.attributes.phone')]),
            'phone.min'         => __('validation.min.string' , ['attribute' => __('validation.attributes.phone')]),
            'phone.regex'       => __('validation.regex' , ['attribute' => __('validation.attributes.phone')]),

            'message.required'  => __('validation.required' , ['attribute' => __('validation.attributes.message')]),
            'message.string'    => __('validation.string' , ['attribute' => __('validation.attributes.message')]),

            ];
        }
}
