<?php

namespace App\Http\Requests\Admin\ValuesServices;

use App\Rules\Media;
use Illuminate\Foundation\Http\FormRequest;

class UpdateValuesServicesRequest extends FormRequest
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
        // dd($this->all());
        return [
            'title'             => ['sometimes', 'string',  'max:255'],
            'description'       => ['sometimes', 'string',  'max:255'],
            'lang_id'           => ['sometimes', 'integer',],
            'image'             => ['sometimes', new Media],
            'status'            => ['sometimes', 'boolean'],
        ];
    }
}
