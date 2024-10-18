<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'position',
        'facebook',
        'twitter',
        'linkedin',
    ];


    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }

}
