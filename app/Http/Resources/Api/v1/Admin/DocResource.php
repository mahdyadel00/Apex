<?php

namespace App\Http\Resources\Api\v1\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class DocResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            'docable_id'   => $this->docable_id,
            'docable_type' => $this->docable_type,
            'name'         => $this->name,
            'path'         => $this->path,
            'created_at'   => $this->created_at,
            'updated_at'   => $this->updated_at
        ];
    }
}
