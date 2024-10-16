<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryData extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_id',
        'name',
        'lang_id',

    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
