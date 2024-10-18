<?php

namespace App\Http\Requests\Admin\Service;

use App\Rules\Media;
use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
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
            'title'         => ['required', 'string', 'max:255'],
            'description'   => ['nullable', 'string'],
            'service_image' => [new Media],
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
            'title.required'        => __('messages.title_required' , ['attribute' => 'Title']),
            'title.string'          => __('messages.title_string' , ['attribute' => 'Title']),
            'title.max'             => __('messages.title_max' , ['attribute' => 'Title' , 'max' => 255]),

            'description.string'    => __('messages.description_string' , ['attribute' => 'Description']),
            ];
        }
}
