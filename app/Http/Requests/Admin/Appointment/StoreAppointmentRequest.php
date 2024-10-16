<?php

namespace App\Http\Requests\Admin\Appointment;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentRequest extends FormRequest
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
            'name'          => ['required', 'string',  'max:255'],
            'date'          => ['required', 'string',  'max:255'],
            'phone'         => ['required', 'string'],
            'state_id'      => ['required', 'integer', 'exists:states,id'],
            'center_id'     => ['required', 'integer', 'exists:centers,id'],
        ];
    }
}
