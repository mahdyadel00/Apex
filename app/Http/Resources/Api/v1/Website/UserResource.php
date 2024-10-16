<?php

namespace App\Http\Resources\Api\v1\Website;

use App\Http\Resources\Api\v1\Student\FrindRequestResource;
use App\Http\Resources\Api\v1\Student\UserBlockResource;
use App\Http\Resources\Api\v1\Student\UserFrindResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Api\v1\Website\PhoneResource;
use App\Http\Resources\Api\v1\Website\MediaResource;

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
            'first_name'  => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name'   => $this->last_name,
            'role'        => optional($this->roles)->pluck('name')->implode(', '),
            'user_name'   => $this->user_name,
            'email'       => $this->email,
            'birthdate'   => $this->birthdate,
            'about'        => $this->about,
            'last_login'  => $this->last_login,
            'login_count' => $this->login_count,
            'user_type'   => $this->user_type,
            'is_changed_password_required' => $this->is_changed_password_required,
//            "country"     => optional($this->country?->data()->whereLang(app()->getLocale())->first())->name,
            'country'     => CountryResource::make($this->country),
            "phone"       => PhoneResource::collection($this->phone),
            "media"       => MediaResource::collection($this->media),
            'created_at'  => $this->created_at,
            'updated_at'  => $this->updated_at,
        ];
    }
}
