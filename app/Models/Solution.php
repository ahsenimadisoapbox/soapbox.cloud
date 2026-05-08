<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    protected $fillable = [
        'module_id',
        'name',
        'description',
        'image',
    ];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
