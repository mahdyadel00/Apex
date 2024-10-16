<?php

namespace App\Http\Resources\Api\v1\Client;

use App\Models\ProductAddition;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderAdditionDetailResource extends JsonResource
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
            'additions'            => ProductAdditionResource::make($this->addition),
        ];
    }
}
