<?php

namespace App\Http\Resources\Api\v1\Student;

use App\Http\Resources\Api\v1\Student\StudentResource;
use Illuminate\Http\Resources\Json\JsonResource;

class EnrollmentResource extends JsonResource
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
            'id'                => $this->id,
            'progress'          => $this->progress,
            'score'             => $this->score,
            'enroll_date'       => $this->enroll_date,
            'last_visit_date'   => $this->last_visit_date,
            'is_approved'       => $this->is_approved,
            'created_at'        => $this->created_at,
            'updated_at'        => $this->updated_at,
            'student'           => StudentResource::make($this->whenLoaded('student')),
            'course'            => CourseResource::make($this->whenLoaded('course')),
        ];
    }
}
