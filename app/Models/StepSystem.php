<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StepSystem extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_id',
        'center_name',
        'controller_name',
        'phone',
        'lab_name',
        'id_number',
        'name_ar',
        'name_en',
        'grades',
        'writing_grade',
        'reading_grade',
        'listening_grade',
        'estimates',
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
