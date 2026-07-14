<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndustryRegulation extends Model
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