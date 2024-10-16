<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectorData extends Model
{
    use HasFactory;

    protected $fillable = [
        'sector_id',
        'lang_id',
        'name',
    ];

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }
}
