<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TermsConditionData extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function termsCondition(){

        return $this->belongsTo(TermsCondition::class);
    }
}
