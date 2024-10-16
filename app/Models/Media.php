<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'media';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'path',
        'type',
        'order',
        'size',
        'is_main',
        'mediable_id',
        'mediable_type',
    ];

    protected $casts = [
        'order'   => 'integer',
        'is_main' => 'boolean',
    ];

    public function mediable()
    {
        return $this->morphTo();
    }
}
