<?php

namespace App\Http\Resources\Api\v1\Client;


use App\Http\Resources\Api\v1\Teacher\EduLevelResource;
use Illuminate\Http\Resources\Json\JsonResource;

class TeacherResource extends JsonResource
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
            'experience'        => $this->experience,
            'is_approved'       => $this->is_approved,
            'created_at'        => $this->created_at,
            'updated_at'        => $this->updated_at,
            'user'              => new UserResource($this->whenLoaded('user')),
            'EduLevel'          => new EduLevelResource($this->whenLoaded('eduLevel')),
            'EduYears'          => EduYearResource::collection($this->whenLoaded('eduYears')),
            'Subjects'          => SubjectResource::collection($this->whenLoaded('subjects')),
            'Courses'           => CourseResource::collection($this->whenLoaded('courses')),
        ];
    }
}
