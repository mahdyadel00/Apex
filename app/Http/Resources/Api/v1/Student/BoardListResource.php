<?php

namespace App\Http\Resources\Api\v1\Student;

use Illuminate\Http\Resources\Json\JsonResource;

class BoardListResource extends JsonResource
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
            'id'                => $this->id,
            'title'             => $this->title,
            'description'       => $this->description,
            'is_allow_posting'  => $this->is_allow_posting,
            'created_at'        => $this->created_at,
            'updated_at'        => $this->updated_at,
            'posts'             => $this->whenNotNull(PostResource::collection($this->whenLoaded('posts'))),
        ];
    }
}
