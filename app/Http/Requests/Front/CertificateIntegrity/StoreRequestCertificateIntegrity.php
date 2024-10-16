<?php

namespace App\Http\Requests\Front\CertificateIntegrity;

use App\Rules\Media;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequestCertificateIntegrity extends FormRequest
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

            'country_id'            =>  ['required','exists:countries,id'],
            'company_name'          =>  ['required','string','max:255'],
            'company_address'       =>  ['required','string','max:255'],
            'manager_name'          =>  ['required','string','max:255'],
            'person_name'           =>  ['required','string','max:255'],
            'person_email'          =>  ['required','email','max:255'],
            'person_phone'          =>  ['required','string','max:255'],
            'id_number'             =>  ['required','string','max:255'],
            'gscore'                =>  ['required','string','max:255'],
            'country_destination'   =>  ['required','string','max:255'],
            'destination_port'      =>  ['required','string','max:255'],
            'notes'                 =>  ['nullable','string','max:255'],
            'media'                 =>  [new Media],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */

    public function messages(): array
    {
        return [
            'country_id.required'           =>  __('messages.country_id_required' , ['attribute' => __('messages.country_id')]),
            'country_id.exists'             =>  __('messages.country_id_exists' , ['attribute' => __('messages.country_id')]),

            'company_name.required'         =>  __('messages.company_name_required' , ['attribute' => __('messages.company_name')]),
            'company_name.string'           =>  __('messages.company_name_string' , ['attribute' => __('messages.company_name')]),
            'company_name.max'              =>  __('messages.company_name_max' , ['attribute' => __('messages.company_name')]),

            'company_address.required'      =>  __('messages.company_address_required' , ['attribute' => __('messages.company_address')]),
            'company_address.string'        =>  __('messages.company_address_string' , ['attribute' => __('messages.company_address')]),
            'company_address.max'           =>  __('messages.company_address_max' , ['attribute' => __('messages.company_address')]),

            'manager_name.required'         =>  __('messages.manager_name_required' , ['attribute' => __('messages.manager_name')]),
            'manager_name.string'           =>  __('messages.manager_name_string' , ['attribute' => __('messages.manager_name')]),
            'manager_name.max'              =>  __('messages.manager_name_max' , ['attribute' => __('messages.manager_name')]),

            'person_name.required'          =>  __('messages.person_name_required' , ['attribute' => __('messages.person_name')]),
            'person_name.string'            =>  __('messages.person_name_string' , ['attribute' => __('messages.person_name')]),
            'person_name.max'               =>  __('messages.person_name_max' , ['attribute' => __('messages.person_name')]),

            'person_email.required'         =>  __('messages.person_email_required' , ['attribute' => __('messages.person_email')]),
            'person_email.email'            =>  __('messages.person_email_email' , ['attribute' => __('messages.person_email')]),
            'person_email.max'              =>  __('messages.person_email_max' , ['attribute' => __('messages.person_email')]),

            'person_phone.required'         =>  __('messages.person_phone_required' , ['attribute' => __('messages.person_phone')]),
            'person_phone.string'           =>  __('messages.person_phone_string' , ['attribute' => __('messages.person_phone')]),
            'person_phone.max'              =>  __('messages.person_phone_max' , ['attribute' => __('messages.person_phone')]),

            'id_number.required'            =>  __('messages.id_number_required' , ['attribute' => __('messages.id_number')]),
            'id_number.string'              =>  __('messages.id_number_string' , ['attribute' => __('messages.id_number')]),
            'id_number.max'                 =>  __('messages.id_number_max' , ['attribute' => __('messages.id_number')]),

            'gscore.required'               =>  __('messages.gscore_required' , ['attribute' => __('messages.gscore')]),
            'gscore.string'                 =>  __('messages.gscore_string' , ['attribute' => __('messages.gscore')]),
            'gscore.max'                    =>  __('messages.gscore_max' , ['attribute' => __('messages.gscore')]),

            'country_destination.required'  =>  __('messages.country_destination_required' , ['attribute' => __('messages.country_destination')]),
            'country_destination.string'    =>  __('messages.country_destination_string' , ['attribute' => __('messages.country_destination')]),
            'country_destination.max'       =>  __('messages.country_destination_max' , ['attribute' => __('messages.country_destination')]),

            'destination_port.required'     =>  __('messages.destination_port_required' , ['attribute' => __('messages.destination_port')]),
            'destination_port.string'       =>  __('messages.destination_port_string' , ['attribute' => __('messages.destination_port')]),
            'destination_port.max'          =>  __('messages.destination_port_max' , ['attribute' => __('messages.destination_port')]),

            'notes.string'                  =>  __('messages.notes_string' , ['attribute' => __('messages.notes')]),
            'notes.max'                     =>  __('messages.notes_max' , ['attribute' => __('messages.notes')]),

            ];
        }

}
