<?php

namespace App\Http\Resources\Api\v1\Admin;

use App\Http\Resources\Api\v1\Admin\EnrollmentResource;
use App\Http\Resources\Api\v1\ClientAuth\GuardianResource;
use App\Http\Resources\Api\v1\Student\UserResource;
use App\Http\Resources\Api\v1\Student\EduYearResource;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
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
            "id"                => $this->id,
            "is_approved"       => $this->is_approved,
            "created_at"        => $this->created_at,
            "updated_at"        => $this->updated_at,
            "user"              =>  UserResource::make($this->whenLoaded('user')),
            'eduyear'           =>  EduYearResource::make($this->whenLoaded('eduyear')),
            'assignment_submissions' => [
                'submissions' => $this->whenLoaded('submissions', function () {
                    return SubmissionResource::collection($this->submissions);
                }),
                'final_score' => $this->when($this->submissions->pluck('submissionGrade')->every(fn($val) => $val !== null)
                    , $this->submissions->pluck('submissionGrade')->max('score'), null),
            ],
            'enrollments'       =>  EnrollmentResource::collection($this->whenLoaded('enrollments')),
            'guardians'         =>  GuardianResource::collection($this->whenLoaded('guardians')),
        ];
    }
}
