<?php

namespace App\Http\Resources\Api\v1\Admin;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class ReportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $modelName = Str::afterLast($this->reportable_type, '\\');
        return [
            'id'              => $this->id,
            'reportable_id'   => $this->reportable_id,
            'reportable_type' => $this->reportable_type,
            'reported_' . strtolower($modelName) => call_user_func("App\\Http\\Resources\\Api\\v1\Admin\\{$modelName}Resource::make",
                $this->when($modelName === 'Post', fn () => $this->reportable?->load('list', 'list.board'), fn() => $this->reportable)),
            'user'           => UserResource::make($this->whenLoaded('user')),
            'reportReason'   => ReportReasonResource::make($this->whenLoaded('reportReason')),
            'message'        => $this->message,
            'comment'        => $this->comment,
            'closed_at'      => $this->closed_at,
            'created_at'     => $this->created_at,
            'updated_at'     => $this->updated_at,
        ];
    }
}
