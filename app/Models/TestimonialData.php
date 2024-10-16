<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestimonialData extends Model
{
    use HasFactory;

    protected $fillable = [
      'testimonial_id',
      'lang_id',
      'title',
      'description',
      'new_title',
      'new_description',
    ];

    public function testimonial()
    {
      return $this->belongsTo(Testimonial::class);
    }
}
