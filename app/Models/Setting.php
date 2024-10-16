<?php

namespace App\Models;

use App\Bll\Lang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo',
        'favicon',
        'email',
        'facebook',
        'twitter',
        'instagram',
        'youtube',
        'phone',
        'phone_2',
        'whats_app',
        'working_hours_from',
        'working_hours_to',
        'km_price',
    ];

    public function data()
    {
        return $this->hasOne(SettingData::class, 'setting_id', 'id')
            ->where('lang_id', Lang::getSelectedLangId());
    }

    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }
}
