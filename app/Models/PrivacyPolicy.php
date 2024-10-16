<?php

namespace App\Models;

use App\Bll\Lang;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivacyPolicy extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
    ];

    public function data()
    {
      return $this->hasMany(PrivacyPolicyData::class);
    }

    public function media()
    {
      return $this->morphMany(Media::class, 'mediable');
    }
}
