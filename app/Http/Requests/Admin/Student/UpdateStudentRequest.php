<?php

namespace App\Http\Requests\Admin\Student;

use App\Rules\Media;
use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
            'name'          => ['sometimes', 'string',  'max:255'],
            "email"         => ["sometimes", "string", "email", "max:255", "unique:students,email," . $this->student . ",id"],
            'phone'         => ['sometimes', 'string'],
            'address'       => ['sometimes', 'string',  'max:255'],
            'image'         => ['sometimes', new Media],
        ];
    }
}
