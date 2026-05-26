<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'image',
        'icon',
        'section_title',
        'section_description',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'slug'
    ];

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}