<?php

namespace App\Http\Resources\Api\v1\Student;


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
            "guardians"         =>  GuardianResource::collection($this->whenLoaded('guardians')),
            'eduyear'           =>  EduYearResource::make($this->whenLoaded('eduyear')),
        ];
    }
}
