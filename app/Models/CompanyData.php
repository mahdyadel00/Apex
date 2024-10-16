<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyData extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'name',
        'lang_id'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
