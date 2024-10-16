<?php

namespace App\Http\Resources\Api\v1\Teacher;

use App\Http\Resources\Api\v1\Admin\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserBlockResource extends JsonResource
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
            'created_at'   => $this->created_at,
            'updated_at'   => $this->updated_at,
            'blocked_user' => UserResource::make($this->blockUser),
        ];
    }
}
