<?php

namespace App\Http\Requests\Admin\Student;

use App\Rules\Media;
use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'name'          => ['required', 'string', 'max:255'],
            'email'         => ['required', 'string', 'unique:students'],
            'password'      => ['required', 'string', 'max:20', 'confirmed'],
            'phone'         => ['required', 'string', 'unique:students'],
            'image'         => ['sometimes', new Media],
        ];
    }
}
