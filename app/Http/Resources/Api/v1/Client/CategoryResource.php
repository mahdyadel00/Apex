<?php

namespace App\Http\Resources\Api\v1\Client;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'name'                  => isset($this->TranslatedData) ? $this->TranslatedData->name : $this->data()->first()?->name,
            'lang_id'               => $code,
            'products'              => ProductResource::collection($this->whenLoaded('products')),
            'media'                 => MediaResource::collection($this->whenLoaded('media')),
        ];
    }
}
