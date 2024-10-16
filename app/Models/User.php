<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'user_name',
        'email',
        'password',
        'birth_date',
        'phone',
        'address',
        'roles_name',
        'pin_code',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'roles_name' => 'array',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    //    public function setPasswordAttribute($value)
//    {
//        $this->attributes['password'] = Hash::make($value);
//    }

    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = $value;
        $this->attributes['user_name'] = explode('@', $value)[0];
    }

    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
