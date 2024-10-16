<?php

namespace App\Http\Requests\Front\Appointment;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequestAppointment extends FormRequest
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
            'name'              => ['regex:/^[\wء-ي]+\s[\wء-ي]+\s[\wء-ي]+\s[\wء-ي]+/u', 'required', 'string'],
            'phone'             => ['required', 'string', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10'],
            'state_id'          => ['required', 'integer', 'exists:states,id'],
            'center_id'         => ['required', 'integer', 'exists:centers,id'],
            'quiz_id'           => ['required', 'integer', 'exists:quizzes,id'],
            'date'              => ['required', 'date'],
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
            'name.regex'        => __('messages.name_regex_4' , ['name' => __('messages.name')]),
            'name.required'     => __('messages.name_required' , ['name' => __('messages.name')]),
            'name.string'       => __('messages.name_string' , ['name' => __('messages.name')]),

            'phone.required'    => __('messages.phone_required' , ['name' => __('messages.phone')]),
            'phone.string'      => __('messages.phone_string' , ['name' => __('messages.phone')]),
            'phone.regex'       => __('messages.phone_regex' , ['name' => __('messages.phone')]),

            'state_id.required' => __('messages.state_id_required' , ['name' => __('messages.state')]),
            'state_id.integer'  => __('messages.state_id_integer' , ['name' => __('messages.state')]),
            'state_id.exists'   => __('messages.state_id_exists' , ['name' => __('messages.state')]),

            'center_id.required'=> __('messages.center_id_required' , ['name' => __('messages.center')]),
            'center_id.integer' => __('messages.center_id_integer' , ['name' => __('messages.center')]),
            'center_id.exists'  => __('messages.center_id_exists' , ['name' => __('messages.center')]),

            'quiz_id.required'  => __('messages.quiz_id_required' , ['name' => __('messages.quiz')]),
            'quiz_id.integer'   => __('messages.quiz_id_integer' , ['name' => __('messages.quiz')]),
            'quiz_id.exists'    => __('messages.quiz_id_exists' , ['name' => __('messages.quiz')]),

            'date.required'     => __('messages.date_required' , ['name' => __('messages.date')]),
            'date.date'         => __('messages.date_date' , ['name' => __('messages.date')]),
        ];
    }
}
