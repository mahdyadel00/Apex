<?php

namespace App\Http\Requests\Admin\TermsCondition;

use App\Rules\Media;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequestTermsCondition extends FormRequest
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

            'title'                => ['sometimes', 'string',  'max:255'],
            'description'          => ['sometimes', 'string'],
            'image'                => ['sometimes', new Media],
            'lang_id'              => ['sometimes', 'integer'],
        ];
    }

    public function messages()
    {
        return [

            'title.required'         =>  __('validation.required', ['attribute' => __('dashboard.title')]),
            'title.string'           =>  __('validation.string', ['attribute' => __('dashboard.title')]),
            'title.max'              =>  __('validation.max.string', ['attribute' => __('dashboard.title')]),

            'description.required'    =>  __('validation.required', ['attribute' => __('dashboard.description')]),
            'description.string'      =>  __('validation.string', ['attribute' => __('dashboard.description')]),
            'description.max'         =>  __('validation.max.string', ['attribute' => __('dashboard.description')]),


            'lang_id.required'  => __('validation.required', ['attribute' => 'language']),

        ];
    }
}
