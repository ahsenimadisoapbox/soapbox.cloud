<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    protected $fillable = [
        'page',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];
}
