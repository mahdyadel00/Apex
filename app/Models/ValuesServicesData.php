<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ValuesServicesData extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'lang_id',
        'values_service_id',
    ];


    public function valueService()
    {
        return $this->belongsTo(ValuesServices::class);
    }
}
