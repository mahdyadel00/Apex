<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderData extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'lang_id',
        'slider_id',
    ];

    public function slider()
    {
        return $this->belongsTo(Slider::class);
    }
}
