<?php

namespace App\Http\Requests\Admin\Company;

use App\Rules\Media;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequestComapny extends FormRequest
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

            'sector_id' =>  ['sometimes', 'exists:sectors,id'],
            'name'      =>  ['sometimes', 'string', 'max:255'],
            'email'     =>  ['sometimes', 'string', 'email', 'max:255'],
            'phone'     =>  ['sometimes', 'string', 'max:255'],
            'logo'      =>  ['sometimes' , new Media],
            'type'      =>  'sometimes|in:step,student,certificate',
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
            'sector_id.exists'   => __('messages.sector_id_exists' , ['attribute' => __('messages.sector')]),

            'name.string'       => __('messages.name_string' , ['attribute' => __('messages.name')]),
            'name.max'          => __('messages.name_max' , ['attribute' => __('messages.name')]),

            'email.string'      => __('messages.email_string' , ['attribute' => __('messages.email')]),
            'email.email'       => __('messages.email_email' , ['attribute' => __('messages.email')]),

            'phone.string'      => __('messages.phone_string' , ['attribute' => __('messages.phone')]),
            'phone.max'         => __('messages.phone_max' , ['attribute' => __('messages.phone')]),

            'type.in'           => 'The selected type is invalid' , ['attribute' => __('messages.type')],
        ];
    }
}
