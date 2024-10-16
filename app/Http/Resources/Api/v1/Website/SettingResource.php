<?php

namespace App\Http\Resources\Api\v1\Website;

use App\Http\Resources\Api\v1\Admin\SettingValueResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
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
            'id'           => $this->id,
            'key'          => $this->key,
            'value_type'   => $this->valueType->name,
            'value'        => (in_array($this->valueType->name, ['media', 'doc', 'phone']))
                ? new ("App\Http\Resources\Api\\v1\Admin\\" . ucfirst($this->valueType->name) . "Resource")($this->{$this->valueType->name}->first())
                : new SettingValueResource($this->value->first()),
        ];
    }
}
