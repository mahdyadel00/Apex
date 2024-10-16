<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformationData extends Model
{
    use HasFactory;

    protected $fillable = [
        'information_id',
        'lang_id',
        'title',
        'description',
    ];

    public function information()
    {
        return $this->belongsTo(Information::class);
    }
}
