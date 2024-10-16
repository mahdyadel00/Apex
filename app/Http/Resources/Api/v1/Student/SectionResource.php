<?php

namespace App\Http\Resources\Api\v1\Student;

use App\Http\Resources\Api\v1\Admin\MediaResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SectionResource extends JsonResource
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
            "name"          => $this->name,
            "introduction"  => $this->introduction,
            "is_required"   => $this->is_required,
            "is_visible"    => $this->is_visible,
            "is_assignment" => $this->is_assignment,
            "created_at"    => $this->created_at,
            "updated_at"    => $this->updated_at,
            "resources"     => MediaResource::collection($this->whenLoaded('media')),
            "assignment"    => $this->when($this->is_assignment, AssignmentResource::make($this->whenLoaded('assignment'))),
        ];
    }
}
