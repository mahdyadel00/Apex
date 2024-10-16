<?php

namespace App\Http\Resources\Api\v1\Website;

use Illuminate\Http\Resources\Json\JsonResource;

class PhoneResource extends JsonResource
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
            'phoneable_id'   => $this->phoneable_id,
            'phoneable_type' => $this->phoneable_type,
            'country_code'   => $this->country_code,
            'phone'          => $this->phone,
            'extension'      => $this->extension,
            'holder_name'    => $this->holder_name,
            'created_at'     => $this->created_at,
            'updated_at'     => $this->updated_at,
        ];
    }
}
