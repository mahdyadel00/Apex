<?php

namespace App\Http\Resources\Api\v1\Client;

use App\Http\Resources\Api\v1\Admin\MediaResource;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'address' => $this->address,
            'lat' => $this->lat,
            'lon' => $this->lon,

        ];
    }
}
