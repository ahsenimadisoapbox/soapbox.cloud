<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    protected $fillable = [

        'title',
        'headline',

        'description',

        'operations_reality',

        'did_you_know',

        'legacy_system_intro',

        'scaling_silo_trap',

        'key_takeaways',

        'common_programmes',

        'image',

        'banner_image',

        'icon',

        'slug',

        'module_ids',

        'meta_title',
        'cta_title',
        'cta_description',

        'meta_description',

        'meta_keywords'
    ];

    protected $casts = [

        'module_ids' => 'array',

        'scaling_silo_trap' => 'array',
    ];

    public function operations()
    {
        return $this->hasMany(IndustryOperation::class);
    }

    public function regulations()
    {
        return $this->hasMany(IndustryRegulation::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}