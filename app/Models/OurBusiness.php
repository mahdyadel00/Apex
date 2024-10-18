<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurBusiness extends Model
{
    use HasFactory;

    protected $fillable = ['id'];

    public function data()
    {
        return $this->hasMany(OurBusinessData::class);
    }

    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }
}
