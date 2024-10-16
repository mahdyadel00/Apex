<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;

    protected $fillable = [
        'state_id',
    ];

    public function data()
    {
        return $this->hasMany(SectorData::class);
    }
    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function companies()
    {
        return $this->hasMany(Company::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
