<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisionData extends Model
{
    use HasFactory;

    protected $fillable = [

        'training_courses',
        'quality_policy',
        'social_responsibility',
        'communication',
    ];

    protected $casts = [
        'training_courses'            =>  'string',
        'quality_policy'              =>  'string',
        'social_responsibility'       =>  'string',
        'communication'               =>  'string',
    ];

    public function vision()
    {

        return $this->belongsTo(VisionData::class);
    }
}
