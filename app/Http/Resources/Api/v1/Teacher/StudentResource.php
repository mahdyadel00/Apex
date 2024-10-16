<?php

namespace App\Http\Resources\Api\v1\Teacher;

use App\Http\Resources\Api\v1\Teacher\UserResource;
use App\Http\Resources\Api\v1\Teacher\EduYearResource;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
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

            "id" => $this->id,
            "is_approved" => $this->is_approved,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            "user" => $this->whenLoaded('user', function () {
                return UserResource::make($this->user);
            }),
            'eduyear' => $this->whenLoaded('eduyear', function () {
                return EduYearResource::make($this->eduyear);
            }),
            'assignment_submissions' => [
                'submissions' => $this->whenLoaded('submissions', function () {
                    return SubmissionResource::collection($this->submissions);
                }),
                'final_score' => $this->when($this->submissions->pluck('submissionGrade')->every(fn($val) => $val !== null)
                    , $this->submissions->pluck('submissionGrade')->max('score'), null),
            ],
            'enrollment' => $this->whenLoaded('enrollments', function () use ($request) {
                return \App\Http\Resources\Api\v1\Student\EnrollmentResource::make($this->enrollments()->whereRelation('submissions', 'assignment_id', $request->assignment_id)->first());
            }),
        ];
    }
}
