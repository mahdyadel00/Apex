<?php

namespace App\Http\Resources\Api\v1\Client;

use App\Http\Resources\Api\v1\Admin\MediaResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        if (auth()->user() && in_array($this->id, auth()->user()->favourites()->pluck('product_id')->toArray())){
            $favourite = true;
        }else {
            $favourite = false;
        }

        $code = '';
        if($this->data()->first()->lang_id == 1) {
            $code = 'en';
        }else{
            $code = 'ar';
        }
        return [
            "id"                       => $this->id,
            'name'                     => isset($this->TranslatedData) ? $this->TranslatedData->name : $this->data()->first()?->name,
            'description'              => isset($this->TranslatedData) ? $this->TranslatedData->description : $this->data()->first()?->description,
            'lang'                     => $code,
            'price'                    => $this->price,
            'discount_price'           => $this->discount_price,
            'featured'                 => $this->featured,
            'your_choice'              => $this->your_choice,
            'currency'                 => $this->currency,
            "media"                    => MediaResource::collection($this->whenLoaded('media')),
            "addition"                 => ProductAdditionResource::collection($this->whenLoaded('additions')),
            'is_favourite' => $favourite,
        ];
    }
}
