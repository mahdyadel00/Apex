<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
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
        return $this->hasMany(InformationData::class);
    }

    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }
}
