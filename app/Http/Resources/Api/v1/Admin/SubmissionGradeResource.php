<?php

namespace App\Http\Resources\Api\v1\Admin;

use App\Http\Resources\Api\v1\Student\StudentResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SubmissionGradeResource extends JsonResource
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
            'id'         => $this->id,
            'score'      => $this->score,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'grade'      => GradeResource::make($this->whenLoaded('grade')),
            'submission' => SubmissionResource::make($this->whenLoaded('submission')),
            'teacher'    => TeacherResource::make($this->whenLoaded('teacher')),
        ];
    }
}
