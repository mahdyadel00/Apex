<?php

namespace App\Http\Traits;

use App\Models\Phone;

trait PhoneTrait
{

    protected function savePhone($request, $model)
    {
        Phone::updateOrCreate(
            ['phoneable_id' => $model->id, 'phoneable_type' => get_class($model)],
            [
                "phoneable_id" => $model->id,
                "phoneable_type" => get_class($model),
                "phone" => $request->phone ?? $request->value,
                "country_code" => $request->country_code,
                "holder_name" => $request->holder_name,
                "extension" => $request->extension,
            ]
        );
    }
}
