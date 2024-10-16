<?php

namespace App\Http\Requests\Admin\Post;

use App\Rules\Media;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'title'         => ['sometimes', 'string', 'max:255'],
            'description'   => ['sometimes', 'string'],
            'thumb'         => ['sometimes', new Media],
            'full_img'      => ['sometimes', new Media],
        ];
    }


    /**
     * Get the error messages for the defined validation rules.
     */

    public function messages(): array
    {
        return [
            'title.string' => __('messages.title_string' , ['attribute' => __('messages.title')]),
            'title.max' => __('messages.title_max' , ['attribute' => __('messages.title')]),
            'description.string' => __('messages.description_string' , ['attribute' => __('messages.description')]),
            'thumb.image' => __('messages.thumb_image' , ['attribute' => __('messages.thumb')]),
            'full_img.image' => __('messages.full_img_image' , ['attribute' => __('messages.full_img')]),
        ];
    }

}
