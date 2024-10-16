<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StateData extends Model
{
    use HasFactory;

    protected $fillable = [
        'state_id',
        'lang_id',
        'name',
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
