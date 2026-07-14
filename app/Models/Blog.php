<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'content',
        'mobile_content',
        'author',
        'role',
        'linkedin',
        'image',
        'image_alt',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'status',
    ];
}
