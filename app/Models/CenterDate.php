<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CenterDate extends Model
{
    use HasFactory;

    protected $fillable = [
        'center_id',
        'lang_id',
        'name',
        'description',
    ];

    public function center(){
        return $this->belongsTo(Center::class);
    }
}
