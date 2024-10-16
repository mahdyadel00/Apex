<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivacyPolicyData extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'lang_id',
        'privacy_policy_id',
    ];


    public function privacyPolicy()
    {

        return $this->belongsTo(PrivacyPolicy::class);
    }
}
