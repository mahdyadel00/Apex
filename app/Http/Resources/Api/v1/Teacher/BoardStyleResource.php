<?php

namespace App\Http\Resources\Api\v1\Teacher;

use App\Http\Resources\Api\v1\Admin\MediaResource;
use Illuminate\Http\Resources\Json\JsonResource;

class BoardStyleResource extends JsonResource
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
            'id'                => $this->id,
            'name'              => $this->data->where('lang', app()->getLocale())->first()->name ?? null,
            'primary_color'     => $this->primary_color,
            'secondary_color'   => $this->secondary_color,
            'is_available'      => $this->is_available,
            'created_at'        => $this->created_at,
            'updated_at'        => $this->updated_at,
            'media'             => MediaResource::collection($this->whenLoaded('media')),
        ];
    }
}
