<?php

namespace App\Http\Requests\Admin\Auth;

use Illuminate\Foundation\Http\FormRequest;

class UpdadteProfile extends FormRequest
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
        // dd($this->all());
        return [

            'first_name'        => ['sometimes', 'string', 'max:255'],
            'last_name'         => ['sometimes', 'string', 'max:255'],
            'user_name'         => ['sometimes', 'string', 'max:255'],
            'email'             => ['sometimes', 'string', 'max:255'],
            // 'password'          => ['sometimes', 'string',  'max:20', 'confirmed'],
            'phone'             => ['sometimes', 'integer'],
            'address'           => ['sometimes', 'string', 'max:255'],
            'birth_date'        => ['sometimes', 'date'],
            'image'             => ['sometimes', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
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
            'first_name.required'       => __('validation.required', ['attribute' => __('dashboard.first_name')]),
            'first_name.string'         => __('validation.string', ['attribute' => __('dashboard.first_name')]),
            'first_name.max'            => __('validation.max.string', ['attribute' => __('dashboard.first_name'), 'max' => 255]),

            'last_name.required'        => __('validation.required', ['attribute' => __('dashboard.last_name')]),
            'last_name.string'          => __('validation.string', ['attribute' => __('dashboard.last_name')]),
            'last_name.max'             => __('validation.max.string', ['attribute' => __('dashboard.last_name'), 'max' => 255]),

            'user_name.required'        => __('validation.required', ['attribute' => __('dashboard.user_name')]),
            'user_name.string'          => __('validation.string', ['attribute' => __('dashboard.user_name')]),
            'user_name.max'             => __('validation.max.string', ['attribute' => __('dashboard.user_name'), 'max' => 255]),

            'email.required'            => __('validation.required', ['attribute' => __('dashboard.email')]),
            'email.unique'              => __('validation.unique', ['attribute' => __('dashboard.email')]),
            'email.string'              => __('validation.string', ['attribute' => __('dashboard.email')]),
            'email.max'                 => __('validation.max.string', ['attribute' => __('dashboard.email'), 'max' => 255]),

            // 'password.<PASSWORD>'       => __('<PASSWORD>', ['attribute' => __('dashboard.password')]),
            // '<PASSWORD>.min'            => __('validation.min.string', ['attribute' => __('dashboard.password'), 'min' => 6]),
            // 'password.confirmed'        => __('validation.confirmed', ['attribute' => __('dashboard.password')]),

            'address.required'          => __('validation.required', ['attribute' => __('dashboard.address')]),
            'address.string'            => __('validation.string', ['attribute' => __('dashboard.address')]),
            'address.max'               => __('validation.max.string', ['attribute' => __('dashboard.address'), 'max' => 255]),

            //'lat.required'            => __('validation.required', ['attribute' => __('dashboard.latitude')]),
            //'lat.string'              => __('validation.string', ['attribute' => __('dashboard.latitude')]),
            //'lat.max'                 => __('validation.max.string', ['attribute' => __('dashboard.latitude'), 'max' => 255]),

            //'lng.required'            => __('validation.required', ['attribute' => __('dashboard.longitude')]),
            //'lng.string'              => __('validation.string', ['attribute' => __('dashboard.longitude')]),
            //'lng.max'                 => __('validation.max.string', ['attribute' => __('dashboard.longitude'), 'max' => 255]),

            'status.required'           => __('validation.required', ['attribute' => __('dashboard.active')]),
            'status.boolean'            => __('validation.boolean', ['attribute' => __('dashboard.active')]),

            'image.required'            => __('validation.required', ['attribute' => __('dashboard.profile_picture')]),
            'image.image'               => __('validation.filetype', ['attribute' => __('dashboard.profile_picture'), 'extensions' => 'jpg|png']),
            'image.mimes'               => __('validation.mimetypes', ['attribute' => __('dashboard.profile_picture'), 'values' => 'jpg,png']),
            'image.dimensions'          => __('validation.dimensions', ['attribute' => __('dashboard.profile_picture'), 'width' => 1080, 'height' => 1080]),
            // 'image.size'             => __('validation.size',['attribute'=>__('dashboard.profile_picture'),'max'=>3*102]),

            'phone.required'            => __('validation.required', ['attribute' => __('dashboard.phone')]),
            'phone.numeric'             => __('validation.numeric', ['attribute' => __('dashboard.phone')]),
        ];
    }
}
