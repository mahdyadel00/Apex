<?php

namespace App\Http\Requests\Admin\Team;

use App\Rules\Media;
use Illuminate\Foundation\Http\FormRequest;

class StoreTeamRequest extends FormRequest
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
            'position'  => ['required', 'string', 'max:255'],
            'facebook'  => ['nullable', 'string', 'max:255'],
            'twitter'   => ['nullable', 'string', 'max:255'],
            'linkedin'  => ['nullable', 'string', 'max:255'],
            'image'     => [new Media],
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
            'name.required'     => __('validation.required', ['attribute' => 'name']),
            'name.string'       => __('validation.string', ['attribute' => 'name']),
            'name.max'          => __('validation.max.string', ['attribute' => 'name', 'max' => 255]),

            'position.required' => __('validation.required', ['attribute' => 'position']),
            'position.string'   => __('validation.string', ['attribute' => 'position']),
            'position.max'      => __('validation.max.string', ['attribute' => 'position', 'max' => 255]),

            'facebook.string'   => __('validation.string', ['attribute' => 'facebook']),
            'facebook.max'      => __('validation.max.string', ['attribute' => 'facebook', 'max' => 255]),

            'twitter.string'    => __('validation.string', ['attribute' => 'twitter']),
            'twitter.max'       => __('validation.max.string', ['attribute' => 'twitter', 'max' => 255]),

            'linkedin.string'   => __('validation.string', ['attribute' => 'linkedin']),
            'linkedin.max'      => __('validation.max.string', ['attribute' => 'linkedin', 'max' => 255]),
        ];
    }
}


