<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    use HasFactory;

    protected $fillable = [
        'state_id',
        'is_active',
      ];
    protected $casts = [
        'is_active' => 'boolean',
        ];

    public function data(){
        return $this->hasMany(CenterDate::class);
    }

    public function state(){
        return $this->belongsTo(State::class);
    }

    public function appointments(){
        return $this->hasMany(Appointment::class);
    }
}
