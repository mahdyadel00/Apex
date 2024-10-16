<?php

namespace App\Http\Resources\Api\v1\Student;

use App\Http\Resources\Api\v1\Teacher\MediaResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SubjectResource extends JsonResource
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
            'id'            => $this->id,
            'name'          => $this->data()->whereLang(app()->getLocale())->first()->name ?? null,
            'is_available'  => $this->is_available,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at,
            'media'         => MediaResource::collection($this->media)
        ];
    }
}
