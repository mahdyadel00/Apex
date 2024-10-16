<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'date',
        'state_id',
        'center_id',
        'quiz_id'
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function center()
    {
        return $this->belongsTo(Center::class);
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}
