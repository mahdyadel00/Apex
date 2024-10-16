<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ValuesServices extends Model
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
       return  $this->hasMany(ValuesServicesData::class);
    }

    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }
}
