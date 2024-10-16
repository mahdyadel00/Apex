<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingData extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'description',
        'address',
        'lang_id',
        'setting_id',
    ];

    public function setting()
    {

        return $this->belongsTo(Setting::class);
    }
}
