<?php

namespace App\Http\Resources\Api\v1\Client;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderDetailResource extends JsonResource
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
            'order_number'               => $this->order_number,
            'total'               => $this->total,
            'order_status'            => $this->order_status,
            'order_date'            => $this->order_date,
            'discount'            => (int)$this->discount,
            'notes'            => $this->notes,
            'address'            =>AddressResource::make($this->address),
            'client'            =>ClientResource::make($this->client),
            'products'            => OrderProductDetailResource::collection($this->products),
            'additions'            => OrderAdditionDetailResource::collection($this->additions),
        ];
    }
}
