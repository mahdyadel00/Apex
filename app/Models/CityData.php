<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityData extends Model
{
    use HasFactory;

    protected $fillable = ['city_id', 'name' ,'lang_id'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
