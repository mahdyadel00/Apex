<?php

namespace App\Http\Resources\Api\v1\Student;

use App\Http\Resources\Api\v1\Admin\MediaResource;
use Illuminate\Http\Resources\Json\JsonResource;

class EduYearResource extends JsonResource
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
            'id'            => $this->id,
            'name'          => isset($this->TranslatedData) ? $this->TranslatedData->name : $this->data()->first()?->name,
            'lang'          => isset($this->TranslatedData) ? $this->TranslatedData->lang : $this->data()->first()?->lang,
            'order'         => $this->order,
            'is_available'  => $this->is_available,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at,
            'media'         => MediaResource::collection($this->whenLoaded('media')),
        ];


    }
}
