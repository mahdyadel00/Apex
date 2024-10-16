<?php

namespace App\Http\Resources\Api\v1\Teacher;

use App\Http\Resources\Api\v1\Admin\AssignmentTypeResource;
use App\Http\Resources\Api\v1\Admin\MediaResource;
use App\Http\Resources\Api\v1\Admin\SectionResource;
use Illuminate\Http\Resources\Json\JsonResource;

class AssignmentResource extends JsonResource
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
            'id'                       => $this->id,
            "start_date"               => $this->start_date,
            "due_date"                 => $this->due_date,
            "max_score"                => $this->max_score,
            "max_attempts"             => $this->max_attempts,
            "is_allow_late_submission" => $this->is_allow_late_submission,
            "created_at"               => $this->created_at,
            "updated_at"               => $this->updated_at,
            "section"                  => SectionResource::make($this->whenLoaded('section')),
            "attachments"              => MediaResource::collection($this->whenLoaded('media')),
            "assignment_type"          => AssignmentTypeResource::make($this->whenLoaded('assignmentType')),
        ];
    }
}
