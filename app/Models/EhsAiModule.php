<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EhsAiModule extends Model
{
    protected $fillable = [

        'name',
        'slug',
        'banner_image',
        'ai_assist_image',

        'hero_title',
        'hero_headline',
        'hero_copy',

        'why_ai_assist',

        'human_loop_description',
        'help_icon',
        'business_outcome_icon',

        'cta_title',
        'cta_description',

        'meta_title',
        'meta_description',
        'meta_keywords',

        'sort_order',
        'status'
    ];

    public function helpItems()
    {
        return $this->hasMany(EhsAiHelpItem::class);
    }

    public function trustPoints()
    {
        return $this->hasMany(EhsAiTrustPoint::class);
    }

    public function businessOutcomes()
    {
        return $this->hasMany(EhsAiBusinessOutcome::class);
    }
}