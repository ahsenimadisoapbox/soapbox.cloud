<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EhsAiTrustPoint extends Model
{
    protected $fillable = [
        'ehs_ai_module_id',
        'name',
        'sort_order'
    ];

    public function module()
    {
        return $this->belongsTo(EhsAiModule::class, 'ehs_ai_module_id');
    }
}