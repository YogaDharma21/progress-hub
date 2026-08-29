<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EventTopic extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'title',
        'description',
        'order',
    ];

    protected static function booted(): void
    {
        static::saved(function (EventTopic $topic) {
            $topic->event->recalculateProgress();
        });

        static::deleted(function (EventTopic $topic) {
            $topic->event->recalculateProgress();
        });
    }

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
