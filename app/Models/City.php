<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['is_active' , 'country_id'];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function data()
    {
        return $this->hasMany(CityData::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

}
