<?php

namespace App\Http\Resources\Api\v1\Admin;

use App\Models\PermissionRole;
use Illuminate\Http\Resources\Json\JsonResource;

class SubPermissionResource extends JsonResource
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
            'id'         => $this->id,
            'name'       => $this->name,
            'is_checked' => $this->is_checked,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
