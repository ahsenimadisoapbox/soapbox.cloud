<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DemoRequest extends Model
{
    protected $fillable = [
        'full_name',
        'email',
        'company_name',
        'industry',
        'primary_interest',
        'notes',
        'status'
    ];
}