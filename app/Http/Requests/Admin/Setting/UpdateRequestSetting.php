<?php

namespace App\Http\Requests\Admin\Setting;

use App\Rules\Media;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequestSetting extends FormRequest
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

            'name'                => ['sometimes', 'string',  'max:255'],
            'email'               => ['sometimes', 'string',  'max:255'],
            'facebook'            => ['sometimes', 'string',  'max:255'],
            'twitter'             => ['sometimes', 'string',  'max:255'],
            'instagram'           => ['sometimes', 'string',  'max:255'],
            'youtube'             => ['sometimes', 'string',  'max:255'],
            'address'             => ['sometimes', 'string',  'max:255'],
            'phone'               => ['sometimes', 'string',  'max:255'],
            'phone_2'             => ['sometimes', 'string',  'max:255'],
            'whats_app'           => ['sometimes', 'string',  'max:255'],
            'description'         => ['sometimes', 'string',  'max:255'],
            'km_price'            => ['sometimes', 'string',  'max:255'],
            'working_hours_from'  => ['sometimes'],
            'working_hours_to'    => ['sometimes'],
            'logo'                => ['sometimes', new Media],
            'favicon'             => ['sometimes', new Media],
        ];
    }

    public function messages()
    {
        return [

            'name.required'    =>  __('validation.required', ['attribute' => __('dashboard.name')]),
            'name.string'      =>  __('validation.string', ['attribute' => __('dashboard.name')]),
            'name.max'         =>  __('validation.max.string', ['attribute' => __('dashboard.name')]),
            'email.required'   =>  __('validation.required', ['attribute' => __('dashboard.email')]),
            'email.string'     =>  __('validation.string', ['attribute' => __('dashboard.email')]),
            'email.max'        =>  __('validation.max.string', ['attribute' => __('dashboard.email')]),
            'facebook.required' =>  __('validation.required', ['attribute' => __('dashboard.facebook')]),
            'facebook.string'  =>  __('validation.string', ['attribute' => __('dashboard.facebook')]),
            'facebook.max'     =>  __('validation.max.string', ['attribute' => __('dashboard.facebook')]),
            'twitter.required' =>  __('validation.required', ['attribute' => __('dashboard.twitter')]),
            'twitter.string'   =>  __('validation.string', ['attribute' => __('dashboard.twitter')]),
            'twitter.max'      =>  __('validation.max.string', ['attribute' => __('dashboard.twitter')]),
            'instagram.required' =>  __('validation.required', ['attribute' => __('dashboard.instagram')]),
            'instagram.string'  =>  __('validation.string', ['attribute' => __('dashboard.instagram')]),
            'instagram.max'     =>  __('validation.max.string', ['attribute' => __('dashboard.instagram')]),
            'youtube.required' =>  __('validation.required', ['attribute' => __('dashboard.youtube')]),
            'youtube.string'   =>  __('validation.string', ['attribute' => __('dashboard.youtube')]),
            'youtube.max'      =>  __('validation.max.string', ['attribute' => __('dashboard.youtube')]),
            'address.required' =>  __('validation.required', ['attribute' => __('dashboard.address')]),
            'address.string'   =>  __('validation.string', ['attribute' => __('dashboard.address')]),
            'address.max'      =>  __('validation.max.string', ['attribute' => __('dashboard.address')]),
            'phone.required'   =>  __('validation.required', ['attribute' => __('dashboard.phone')]),
            'phone.string'     =>  __('validation.string', ['attribute' => __('dashboard.phone')]),
            'phone.max'        =>  __('validation.max.string', ['attribute' => __('dashboard.phone')]),
            'phone_2.required' =>  __('validation.required', ['attribute' => __('dashboard.phone_2')]),
            'phone_2.string'   =>  __('validation.string', ['attribute' => __('dashboard.phone_2')]),
            'whats_app.string'   =>  __('validation.string', ['attribute' => __('dashboard.whats_app')]),

        ];
    }
}
