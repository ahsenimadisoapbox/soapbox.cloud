<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VisitorSession extends Model
{
    protected $fillable = [
        'session_key',
        'ip_address',
        'country_code',
        'device_name',
        'device_type',
        'browser',
        'os',
        'language',
        'timezone',
        'screen_size',
        'user_agent',
        'first_seen_at',
        'last_seen_at',
        'total_duration_seconds',
        'page_views_count',
    ];

    protected $casts = [
        'first_seen_at' => 'datetime',
        'last_seen_at' => 'datetime',
    ];

    public function pageVisits(): HasMany
    {
        return $this->hasMany(VisitorPageVisit::class);
    }
}
