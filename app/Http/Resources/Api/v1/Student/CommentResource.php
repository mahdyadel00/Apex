<?php

namespace App\Http\Resources\Api\v1\Student;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'comment_on' => $this->getCommentable(),
            'comment'    => $this->text,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user'       => UserResource::make($this->user),
        ];
    }

    private function getCommentable()
    {
        return match ($this->commentable_type){
            'App\Models\Post' => PostResource::make($this->commentable)
        };
    }
}
