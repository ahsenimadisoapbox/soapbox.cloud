<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
    'title',
    'alt',
    'redirect_url',
    'image',
    'path',
];
}