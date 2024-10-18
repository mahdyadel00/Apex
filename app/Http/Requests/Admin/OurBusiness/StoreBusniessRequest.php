<?php

namespace App\Http\Requests\Admin\OurBusiness;

use App\Rules\Media;
use Illuminate\Foundation\Http\FormRequest;

class StoreBusniessRequest extends FormRequest
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
            'title'                 => ['required', 'string', 'max:255'],
            'description'           => ['nullable', 'string'],
            'our_business_image'    => [new Media],
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'title'                 => __('our_business.title' , ['attribute' => __('our_business.title')]),
            'description'           => __('our_business.description' , ['attribute' => __('our_business.description')]),
            ];
        }
}
