<?php

namespace App\Http\Resources\Api\v1\Teacher;

use Illuminate\Http\Resources\Json\JsonResource;

class GuardianResource extends JsonResource
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
            "id"            => $this->id,
            'is_approved'   => $this->is_approved,
            'is_parent'     => $this->studentGuardians()->where('student_id', auth()->user()->type_id)->exists(),
            "created_at"    => $this->created_at,
            "updated_at"    => $this->updated_at,
            'user'          => UserResource::make($this->whenLoaded('user')),
            'students'      => StudentResource::collection($this->whenLoaded('students')),
        ];
    }
}
