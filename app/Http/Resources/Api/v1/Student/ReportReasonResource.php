<?php

namespace App\Http\Resources\Api\v1\Student;

use Illuminate\Http\Resources\Json\JsonResource;

class ReportReasonResource extends JsonResource
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
            'id'            => $this->id,
            'name'          => $this->data->where('lang', app()->getLocale())->first()?->name ?? $this->data->first()->name,
            'lang'          => $this->data->where('lang', app()->getLocale())->first()?->lang ?? $this->data->first()->lang,
            'is_available'  => $this->is_available,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at,
        ];
    }
}
