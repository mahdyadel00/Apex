<?php

namespace App\Http\Resources\Api\v1\Client;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderProductDetailResource extends JsonResource
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
            'quantity'               => $this->quantity,
            'price'               => $this->price,
            'product'            => ProductResource::make($this->product),
        ];
    }
}
