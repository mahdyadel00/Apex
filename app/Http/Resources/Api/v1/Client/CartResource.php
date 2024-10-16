<?php

namespace App\Http\Resources\Api\v1\Client;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'id'                  => $this->id,
            'price'               => $this->price,
            'quantity'            => $this->quantity,
            'products'            => ProductResource::collection($this->whenLoaded('products')),
            'additions'            => ProductAdditionResource::collection($this->whenLoaded('additions')),
        ];
    }
}
