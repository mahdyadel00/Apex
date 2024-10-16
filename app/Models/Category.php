<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_active',
    ];

    public function data()
    {
        return $this->hasMany(CategoryData::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

}
