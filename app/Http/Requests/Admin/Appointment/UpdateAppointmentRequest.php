<?php

namespace App\Http\Requests\Admin\Appointment;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAppointmentRequest extends FormRequest
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
            'date'          => ['sometimes', 'string',  'max:255'],
            'phone'         => ['sometimes', 'string'],
            'state_id'      => ['sometimes', 'integer', 'exists:states,id'],
            'center_id'     => ['sometimes', 'integer', 'exists:centers,id'],
        ];
    }
}
