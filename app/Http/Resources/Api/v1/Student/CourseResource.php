<?php

namespace App\Http\Resources\Api\v1\Student;

use App\Http\Resources\Api\v1\Admin\MediaResource;
use App\Http\Resources\Api\v1\Teacher\BoardResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
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
            'id'                  => $this->id,
            'name'                => $this->name,
            'description'         => $this->description,
            'color'               => $this->color,
            'start_date'          => $this->start_date,
            'end_date'            => $this->end_date,
            'is_summer'           => $this->is_summer,
            'is_approved'         => $this->is_approved,
            'is_enrollement_open' => $this->is_enrollement_open,
            'lessons_count'       => $this->lessons_count,
            'edu_years'            => EduYearResource::collection($this->whenLoaded('eduYears')),
            'subjects'             => SubjectResource::collection($this->whenLoaded('subjects')),
            'teachers'            => TeacherResource::collection($this->whenLoaded('teachers')),
            'image'               => MediaResource::collection($this->whenLoaded('media')),
            'enrollments'         => EnrollmentResource::make($this->whenLoaded('enrollments', function () {
                return $this->enrollments()->where('student_id', auth()->user()->type_id)->where('course_id', $this->id)->first();
            })),
            'lessons'             => LessonResource::collection($this->whenLoaded('lessons')),
            'boards'              => BoardResource::collection($this->whenLoaded('boards')),
            'created_at'          => $this->created_at,
            'updated_at'          => $this->updated_at,
        ];
    }
}
