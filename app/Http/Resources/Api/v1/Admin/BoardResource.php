<?php

namespace App\Http\Resources\Api\v1\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class BoardResource extends JsonResource
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
            'title'         => $this->title,
            'description'   => $this->description,
            'is_approved'   => $this->is_approved,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at,
            'style'         => $this->whenLoaded('boardStyle', function () {
                return new BoardStyleResource($this->boardStyle);
            }),
            'lists'         => $this->whenLoaded('lists', function () {
                return BoardListResource::collection($this->lists);
            }),
            'course'        => $this->whenLoaded('course', function () {
                return new CourseResource($this->course);
            }),
        ];
    }
}
