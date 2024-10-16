<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vision extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
    ];


    public function data()
    {

        return $this->hasMany(VisionData::class);
    }

    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }
}
