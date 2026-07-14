<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = [
        'name',
        'short_description',
        'description',
        'image',
        'banner_image',
        'icon',
        'category_id',
        'challenger_heading',
        'solution_heading',
        'sort_order',
        'slug',
        'cta',
        'is_live',
        'status',
        'meta_title',
        'meta_description',
        'meta_keywords'
    ];

    public function challengers()
    {
        return $this->hasMany(Challenger::class);
    }

    public function solutions()
    {
        return $this->hasMany(Solution::class);
    }

    public function keyCapabilities()
    {
        return $this->hasMany(KeyCapability::class);
    }

    public function uses()
    {
        return $this->hasMany(UseCase::class);
    }

    public function measurables()
    {
        return $this->hasMany(Measurable::class);
    }

    public function frameworks()
    {
        return $this->hasMany(Framework::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
