<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UseCase extends Model
{
    protected $fillable = [
        'module_id',
        'name',
        'description',
    ];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
