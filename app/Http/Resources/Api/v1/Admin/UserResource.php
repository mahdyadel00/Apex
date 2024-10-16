<?php

namespace App\Http\Resources\Api\v1\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'id'                => $this->id,
            'type'              => $this->user_type,
            'type_id'           => $this->type_id,
            'first_name'        => $this->first_name,
            'middle_name'       => $this->middle_name,
            'last_name'         => $this->last_name,
            // 'role'        => optional($this->roles)->pluck('id')->implode(', '),
            'user_name'   => $this->user_name,
            'email'       => $this->email,
            'birthdate'   => $this->birthdate,
            'about'        => $this->about,
            'is_blocked'  => $this->is_blocked,
            'last_login'  => $this->last_login,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'is_changed_password_required' => $this->is_changed_password_required,
            'is_friend'   => $this->is_friend,
            'is_friend_request_pending' => $this->when(!is_null($this->is_friend_request_pending), $this->is_friend_request_pending),
            "phone"       => PhoneResource::collection($this->phone),
            "media"       => MediaResource::collection($this->media),
            "country"     => new CountryResource($this->whenLoaded('country')),
            'roles'       => RoleResource::collection($this->whenLoaded('roles')),
        ];
    }
}
