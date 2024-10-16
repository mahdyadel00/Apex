<?php

namespace App\Http\Resources\Api\v1\Client;

use App\Http\Resources\Api\v1\Admin\MediaResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
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
            'id'                                => $this->id,
            'name'                              => $this->name,
            'email'                             => $this->email,
            "phone"                             => $this->phone,
            "show_notification"                             => $this->show_notification,
            "media"                             => MediaResource::collection($this->media),
            'created_at'                        => $this->created_at,
            'updated_at'                        => $this->updated_at,
        ];
//            'last_login'                      => $this->last_login,
//            'login_count'                     => $this->login_count,
//            'is_blocked'                      => $this->is_blocked,
//            'is_changed_password_required'    => $this->is_changed_password_required,
    }
}
