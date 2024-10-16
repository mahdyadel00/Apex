<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSystem extends Model
{
    use HasFactory;

    protected $fillable = [
        'education_name',
        'band_name',
        'ranking',
        'grading_data',
        'person_name',
        'person_phone',
    ];

    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }
}
