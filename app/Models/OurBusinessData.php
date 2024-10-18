<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurBusinessData extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'our_business_id' , 'lang_id'];


    public function our_business()
    {
        return $this->belongsTo(OurBusiness::class);
    }
}
