<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizData extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'description',
        'lang_id',
    ];


    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}
