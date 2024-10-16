<?php

namespace App\Http\Resources\Api\v1\Admin;

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
            'is_available'      => $this->is_available,
            'name'              => isset($this->TranslatedData) ? $this->TranslatedData->name : $this->data()->first()?->name,
            'lang'              => isset($this->TranslatedData) ? $this->TranslatedData->lang : $this->data()->first()?->lang,
            'primary_color'     => $this->primary_color,
            'secondary_color'   => $this->secondary_color,
            'created_at'        => $this->created_at,
            'updated_at'        => $this->updated_at,
            'background_image'  => MediaResource::collection($this->whenLoaded('media')),
        ];
    }
}
