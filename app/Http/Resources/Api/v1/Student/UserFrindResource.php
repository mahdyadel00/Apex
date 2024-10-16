<?php

namespace App\Http\Resources\Api\v1\Student;

use App\Http\Resources\Api\v1\Admin\UserResource;
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
            'created_at'  => $this->created_at,
            'updated_at'  => $this->updated_at,
            'friend'      => $this->when($this->sender->id === auth()->id(), UserResource::make($this->receiver), UserResource::make($this->sender)),
        ];
    }
}
