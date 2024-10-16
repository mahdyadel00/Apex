<?php

namespace App\Http\Resources\Api\v1\Client;

use Illuminate\Http\Resources\Json\JsonResource;

class TeacherCommentResource extends JsonResource
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
            'id'            => $this->id,
            'text'          => $this->text,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at,
            'teacher'       => UserResource::make($this->whenLoaded('user')),
            'media'         => MediaResource::collection($this->whenLoaded('media')),
        ];
    }
}
