<?php

namespace App\Http\Resources\Api\v1\Teacher;

use App\Http\Resources\Api\v1\Teacher\CountryResource;
use App\Http\Resources\Api\v1\Teacher\MediaResource;
use App\Http\Resources\Api\v1\Teacher\PhoneResource;
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
            'id'                            => $this->id,
            'type_id'                       => $this->type_id,
            'user_type'                     => $this->user_type,
            'first_name'                    => $this->first_name,
            'middle_name'                   => $this->middle_name,
            'last_name'                     => $this->last_name,
            'role'                          => optional($this->roles)->pluck('name')->implode(', '),
            'user_name'                     => $this->user_name,
            'email'                         => $this->email,
            'about'                         => $this->about,
            'birthdate'                     => $this->birthdate,
            'last_login'                    => $this->last_login,
            'is_changed_password_required'  => $this->is_changed_password_required,
            'is_friend' => $this->is_friend,
            'is_friend_request_pending' => $this->when(!is_null($this->is_friend_request_pending), $this->is_friend_request_pending),//            'is_friend'                     => $this->friends()->where('user_id' , auth()->id())->orWhere('friend_id' , auth()->id())->exists(),
            'created_at'                    => $this->created_at,
            'updated_at'                    => $this->updated_at,
            "country"                       => new CountryResource($this->whenLoaded('country')),
            "phone"                         => PhoneResource::collection($this->whenLoaded('phone')),
            "media"                         => MediaResource::collection($this->whenLoaded('media')),
            "friends"                       => $this->when($request->is('api/' . env("API_VERSION") . '/*/student/*'
                , 'api/' . env("API_VERSION") . '/*/teachers/*',
                'api/' . env("API_VERSION") . '/*/guardians/*'), $this->friends())
        ];
    }
}
