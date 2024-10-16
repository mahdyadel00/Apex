<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutData extends Model
{
    use HasFactory;

    protected $fillable = [

        'about_id',
        'lang_id',
        'title',
        'description',
        'history',
        'objectives',
    ];

    protected $casts = [
        'about_id'      =>  'integer',
        'lang_id'       =>  'integer',
        'title'         =>  'string',
        'description'   =>  'string',
        'history'       =>  'string',
        'objectives'    =>  'string',
    ];

    public function about()
    {

        return $this->belongsTo(About::class);
    }
}
