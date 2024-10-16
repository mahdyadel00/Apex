<?php

namespace App\Http\Resources\Api\v1\Teacher;

use App\Http\Resources\Api\v1\Admin\BoardListResource;
use App\Http\Resources\Api\v1\Admin\CommentResource;
use App\Http\Resources\Api\v1\Admin\MediaResource;
use App\Http\Resources\Api\v1\Admin\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'id'         => $this->id,
            'title'      => $this->title,
            'text'       => $this->text,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user'       => UserResource::make($this->user),
            'list'       => BoardListResource::make($this->whenLoaded('list')),
            'comments'   => CommentResource::collection($this->whenLoaded('comments')),
            'media'      => MediaResource::collection($this->whenLoaded('media')),
        ];
    }
}
