<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EhsAiBusinessOutcome extends Model
{
    protected $fillable = [
        'ehs_ai_module_id',
        'name',
        'description',
        'icon',
        'sort_order'
    ];

    public function module()
    {
        return $this->belongsTo(EhsAiModule::class, 'ehs_ai_module_id');
    }
}