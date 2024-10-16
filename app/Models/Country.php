<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function data()
    {
        return $this->hasMany(CountryData::class);
    }

    public function certificateIntegrities()
    {
        return $this->hasMany(CertificateIntegrity::class);
    }

    public function stepSystems()
    {
        return $this->hasMany(StepSystem::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function states()
    {
        return $this->hasMany(State::class);
    }
}
