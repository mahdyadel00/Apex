<?php

namespace App\Http\Requests\Admin\Vision;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVisionRequest extends FormRequest
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
            'training_courses'          => ['sometimes', 'string'],
            'quality_policy'            => ['sometimes', 'string'],
            'social_responsibility'     => ['sometimes', 'string'],
            'communication'             => ['sometimes', 'string'],
        ];
    }
}
