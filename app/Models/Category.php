<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'sort_order', 'slug'];

    public function modules()
    {
        return $this->hasMany(Module::class);
    }
}
