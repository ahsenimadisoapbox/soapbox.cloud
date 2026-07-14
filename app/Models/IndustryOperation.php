<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndustryOperation extends Model
{
    protected $fillable = [

        'industry_id',
        'name',
        'description',
        'sort_order'
    ];

    public function industry()
    {
        return $this->belongsTo(Industry::class);
    }
}