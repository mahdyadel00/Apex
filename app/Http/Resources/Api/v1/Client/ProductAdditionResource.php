<?php

namespace App\Http\Resources\Api\v1\Client;

use App\Http\Resources\Api\v1\Admin\MediaResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductAdditionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $code = '';
        if($this->data()->first()->lang_id == 1) {
            $code = 'en';
        }else{
            $code = 'ar';
        }
        return [
            "id"                       => $this->id,
            'name'                     => isset($this->TranslatedData) ? $this->TranslatedData->name : $this->data()->first()?->name,
            'price'                    => $this->price,
            'is_active'                    => $this->is_active,
            ];
    }
}
