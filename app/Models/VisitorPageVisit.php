<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VisitorPageVisit extends Model
{
    protected $fillable = [
        'visitor_session_id',
        'visit_key',
        'page_title',
        'page_path',
        'page_url',
        'referrer',
        'duration_seconds',
        'started_at',
        'last_seen_at',
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'last_seen_at' => 'datetime',
    ];

    public function session(): BelongsTo
    {
        return $this->belongsTo(VisitorSession::class, 'visitor_session_id');
    }
}
