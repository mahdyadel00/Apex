<?php

namespace App\Http\Requests\Admin\Post;

use App\Rules\Media;
use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'category_id'           => ['required', 'exists:categories,id'],
            'title'                 => ['required', 'string', 'max:255'],
            'description'           => ['required', 'string'],
            'thumb'                 => [new Media],
            'full_img'              => [new Media],
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
            'title.required'        => __('messages.title_required' , ['attribute' => __('messages.post')]),
            'description.required'  => __('messages.description_required' , ['attribute' => __('messages.post')]),
            'thumb.required'        => __('messages.thumb_required' , ['attribute' => __('messages.post')]),
            'full_img.required'     => __('messages.full_img_required' , ['attribute' => __('messages.post')]),

        ];
    }
}
