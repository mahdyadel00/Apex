<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
      'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function data()
    {
        return $this->hasMany(QuizData::class);
    }

    public function appointment()
    {
        return $this->hasMany(Appointment::class);
    }

}
