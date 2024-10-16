<?php

namespace App\Http\Requests\Admin\User;

use App\Rules\Media;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequestUser extends FormRequest
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

            'first_name'    => ['sometimes', 'string',  'max:255'],
            'last_name'     => ['sometimes', 'string',  'max:255'],
            'user_name'     => ['sometimes', 'string',  'max:255'],
            "email"         => ["sometimes", "string", "email", "max:255", "unique:users,email," . $this->user . ",id"],
            'birth_date'    => ['sometimes', 'date'],
            'phone'         => ['sometimes', 'string'],
            'address'       => ['sometimes', 'string',  'max:255'],
            'roles_name'    => ['sometimes', 'array'],
            'image'         => ['sometimes', new Media],
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'first_name.required'              => __('validation.required', ['attribute' => __('attributes.first_name')]),
            'first_name.string'                => __('validation.string', ['attribute' => __('attributes.first_name')]),
            'first_name.max'                   => __('validation.max.string', ['attribute' => __('attributes.first_name'), 'max' => 80]),

            'last_name.required'              => __('validation.required', ['attribute' => __('attributes.last_name')]),
            'last_name.string'                => __('validation.string', ['attribute' => __('attributes.last_name')]),
            'last_name.max'                   => __('validation.max.string', ['attribute' => __('attributes.last_name'), 'max' => 80]),

            'user_name.required'              => __('validation.required', ['attribute' => __('attributes.user_name')]),
            'user_name.string'                => __('validation.string', ['attribute' => __('attributes.user_name')]),
            'user_name.max'                   => __('validation.max.string', ['attribute' => __('attributes.user_name'), 'max' => 80]),

            'email.required'                  => __('validation.required', ['attribute' => __('attributes.email')]),
            'email.string'                    => __('validation.string', ['attribute' => __('attributes.email')]),
            'email.email'                     => __('validation.email', ['attribute' => __('attributes.email')]),
            'email.unique'                    => __('validation.unique', ['attribute' => __('attributes.email')]),

            'roles_name.required'             => __('validation.required', ['attribute' => __('attributes.roles_name')]),
            'roles_name.integer'              => __('validation.integer', ['attribute' => __('attributes.roles_name')]),
            'roles_name.exists'               => __('validation.exists', ['attribute' => __('attributes.roles_name')]),

            'image.required'                  => __('validation.required', ['attribute' => __('attributes.image')]),
            'image.mimes'                     => __('validation.mimes', ['attribute' => __('attributes.image'), 'values' => 'jpeg,png,jpg,gif,svg']),
        ];
    }
}
