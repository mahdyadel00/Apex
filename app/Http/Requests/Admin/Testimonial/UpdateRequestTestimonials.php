<?php

namespace App\Http\Requests\Admin\Testimonial;

use App\Rules\Media;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequestTestimonials extends FormRequest
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

            'title'                => ['sometimes', 'string',  'max:255'],
            'new_title'            => ['sometimes', 'string',  'max:255'],
            'new_description'      => ['sometimes', 'string'],
            'description'          => ['sometimes', 'string'],
            'lang_id'              => ['sometimes', 'integer'],
            'status'               => ['sometimes', 'boolean'],
            'image'                => ['sometimes', new Media],
            'image_achievements'   => ['sometimes', new Media],
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

            'status.required'        =>  __('validation.required', ['attribute' => __('dashboard.status')]),
            'status.boolean'         =>  __('validation.boolean', ['attribute' => __('dashboard.status')]),

            'lang_id.required'  => __('validation.required', ['attribute' => 'language']),

        ];
    }
}
