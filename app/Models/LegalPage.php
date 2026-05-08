<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LegalPage extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'content',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'status',
    ];
}
