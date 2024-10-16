<?php

namespace App\Models;

use App\Bll\Lang;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function data()
    {
       return  $this->hasMany(SliderData::class);
    }

    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }
}
