<?php

namespace App\Http\Requests\Admin\Country;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequestCountry extends FormRequest
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

            'name'       => ['required', 'string', 'max:255'],
            'is_active'  => ['sometimes', 'boolean'],
        ];
    }

    /**
     * Get the localization attributes.
     */

    public function attributes(): array
    {
        return [
            'name.required' => __('messages.name' , ['attribute' => __('messages.country')]),
            'name.string' => __('messages.name' , ['attribute' => __('messages.country')]),
            'name.max' => __('messages.name' , ['attribute' => __('messages.country')]),

            'is_active.in' => __('messages.is_active' , ['attribute' => __('messages.country')]),

        ];
    }
}
