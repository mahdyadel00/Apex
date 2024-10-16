<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateIntegrity extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_id',
        'company_name',
        'company_address',
        'manager_name',
        'person_name',
        'person_email',
        'person_phone',
        'id_number',
        'gscore',
        'country_destination',
        'destination_port',
        'notes',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }
}
