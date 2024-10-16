<?php

namespace App\Http\Resources\Api\v1\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class UserFrindResource extends JsonResource
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
            'id'          => $this->id,
            'friend'      => $this->when($this->sender->id === auth()->id(), UserResource::make($this->receiver), UserResource::make($this->sender)),
            'created_at'  => $this->created_at,
            'updated_at'  => $this->updated_at,
        ];
    }
}
