<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Company extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'sector_id',
        'email',
        'phone',
        'password',
        'type',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function data()
    {
        return $this->hasMany(CompanyData::class);
    }

    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }
}
