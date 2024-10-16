<?php

namespace App\Http\Resources\Api\v1\Student;

use Illuminate\Http\Resources\Json\JsonResource;

class LessonResource extends JsonResource
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
            'id'                     => $this->id,
            'name'                   => $this->name,
            'description'            => $this->description,
            'color'                  => $this->color,
            'notes'                  => $this->notes,
            'progress'               => $this->progress,
            'sections_count'         => $this->sections_count,
            'start_date'             => $this->start_date,
            'end_date'               => $this->end_date,
            'is_completion_required' => $this->is_completion_required,
            'is_locked'              => $this->is_locked,
            'is_visible'             => $this->is_visible,
            'created_at'             => $this->created_at,
            'updated_at'             => $this->updated_at,
            'course'                 => CourseResource::make($this->whenLoaded('course')),
            'sections'               => SectionResource::collection($this->whenLoaded('sections')),
            'media'                  => MediaResource::collection($this->whenLoaded('media')),
        ];
    }
}
