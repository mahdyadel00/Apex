<?php

namespace App\Http\Resources\Api\v1\Teacher;

use App\Http\Resources\Api\v1\Admin\MediaResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SubmissionResource extends JsonResource
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
            'submit_date'       => $this->submit_date,
            'created_at'        => $this->created_at,
            'updated_at'        => $this->updated_at,
            'enrollment'        => EnrollmentResource::make($this->whenLoaded('enrollment')),
            'assignment'        => AssignmentResource::make($this->whenLoaded('assignment')),
            'answer_docs'       => MediaResource::collection($this->media) ?? null,
            'submission_grade'  => SubmissionGradeResource::make($this->whenLoaded('submissionGrade')),
            'comments'          => TeacherCommentResource::collection($this->comments) ?? null,
        ];
    }
}
