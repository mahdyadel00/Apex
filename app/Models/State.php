<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $fillable = [

        'is_active',
        'country_id',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function data()
    {
        return $this->hasMany(StateData::class);
    }

    public function center()
    {
        return $this->hasMany(Center::class);
    }

    public function sector()
    {
        return $this->hasMany(Sector::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
