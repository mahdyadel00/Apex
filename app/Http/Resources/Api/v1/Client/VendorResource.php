<?php

namespace App\Http\Resources\Api\v1\Client;

use App\Http\Resources\Api\v1\Admin\AssignmentTypeResource;
use App\Http\Resources\Api\v1\Admin\MediaResource;
use App\Http\Resources\Api\v1\Admin\SectionResource;
use Illuminate\Http\Resources\Json\JsonResource;

class VendorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $code = '';
        if($this->data()->first()->lang_id == 1) {
            $code = 'en';
        }else{
            $code = 'ar';
        }

        return [
            'id'                       => $this->id,
            'name'                     => isset($this->TranslatedData) ? $this->TranslatedData->name : $this->data()->first()?->name,
            'lang'                     => $code,
            "phone"                    => $this->phone,
            "mobile"                   => $this->mobile,
            "delivery_charge"          => $this->delivery_charge,
            "delivery_time"            => $this->delivery_time,
            'is_delivery'              => $this->is_delivery == 1 ? true : false,
            "rating"                   => $this->rating,
            "description"              => isset($this->TranslatedData) ? $this->TranslatedData->description : $this->data()->first()?->description,
            "address"                  => isset($this->TranslatedData) ? $this->TranslatedData->address : $this->data()->first()?->address,
            "created_at"               => $this->created_at,
            "updated_at"               => $this->updated_at,
            "media"                    => MediaResource::collection($this->whenLoaded('media')),
            "categories"               => CategoryResource::collection($this->whenLoaded('categories')),
            "products"               => ProductResource::collection($this->products),
        ];
    }
}
