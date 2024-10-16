<?php

namespace App\Http\Requests\Admin\Information;

use App\Rules\Media;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequestInformation extends FormRequest
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
            'title'         =>  ['sometimes', 'string', 'max:255'],
            'description'   =>  ['sometimes', 'string'],
            'image'         =>  ['sometimes', new Media],
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
            'title.required'        =>  __('messages.title_required' , ['attribute' => __('messages.title')]),
            'title.string'          =>  __('messages.title_string' , ['attribute' => __('messages.title')]),
            'title.max'             =>  __('messages.title_max' , ['attribute' => __('messages.title')]),

            'description.required'  =>  __('messages.description_required' , ['attribute' => __('messages.description')]),
            'description.string'    =>  __('messages.description_string' , ['attribute' => __('messages.description')]),

        ];
    }
}
