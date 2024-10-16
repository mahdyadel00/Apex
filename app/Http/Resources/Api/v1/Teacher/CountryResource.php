<?php

namespace App\Http\Resources\Api\v1\Teacher;

use Illuminate\Http\Resources\Json\JsonResource;

class CountryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'           => $this->id,
            'name'         => optional($this->whenLoaded('data', fn() => $this->data->first()))->name,
            'code'         => $this->code,
            'currency'     => $this->currency,
            'flag'         => $this->flag,
            'is_available' => $this->is_available,
            'created_at'   => $this->created_at,
            'updated_at'   => $this->updated_at,
            "states"       => StateResource::collection($this->whenLoaded('states')),
            'cities'       => CityResource::collection($this->whenLoaded('states.cities')),
        ];
    }
}
