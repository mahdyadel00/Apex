<?php

namespace App\Http\Requests\Admin\Company;

use App\Rules\Media;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequestComapny extends FormRequest
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
            'sector_id' =>  ['required', 'exists:sectors,id'],
            'name'      =>  ['required', 'string', 'max:255'],
            'email'     =>  ['required', 'string', 'email', 'max:255', 'unique:companies'],
            'phone'     =>  ['required', 'string', 'max:255'],
            'password'  =>  ['required', 'string', 'min:8', 'confirmed'],
            'logo'      =>  [new Media],
            'type'      =>  'required|in:step,student,certificate',
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
            'sector_id.required' => __('messages.sector_id_required' , ['attribute' => __('messages.sector')]),
            'sector_id.exists'   => __('messages.sector_id_exists' , ['attribute' => __('messages.sector')]),


            'name.required'     => __('messages.name_required' , ['attribute' => __('messages.name')]),
            'name.string'       => __('messages.name_string' , ['attribute' => __('messages.name')]),
            'name.max'          => __('messages.name_max' , ['attribute' => __('messages.name')]),

            'email.required'    => __('messages.email_required' , ['attribute' => __('messages.email')]),
            'email.string'      => __('messages.email_string' , ['attribute' => __('messages.email')]),
            'email.email'       => __('messages.email_email' , ['attribute' => __('messages.email')]),

            'phone.required'    => __('messages.phone_required' , ['attribute' => __('messages.phone')]),
            'phone.string'      => __('messages.phone_string' , ['attribute' => __('messages.phone')]),
            'phone.max'         => __('messages.phone_max' , ['attribute' => __('messages.phone')]),

            'password.required' => __('messages.password_required' , ['attribute' => __('messages.password')]),
            'password.string'   => __('messages.password_string' , ['attribute' => __('messages.password')]),
            'password.min'      => __('messages.password_min' , ['attribute' => __('messages.password')]),

            'type.required'     => __('messages.type_required' , ['attribute' => __('messages.type')]),
            'type.in'           => __('messages.type_in' , ['attribute' => __('messages.type')]),

        ];
    }
}
