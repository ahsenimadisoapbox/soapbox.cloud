<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'industry_id',
        'title',
        'description',
        'image',
        'slug'
    ];

    public function industry()
    {
        return $this->belongsTo(Industry::class);
    }
}