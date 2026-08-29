<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'type',
        'sessions_count',
        'target_capacity',
        'progress_percentage',
        'created_by',
    ];

    protected static function booted(): void
    {
        static::saved(function (Event $event) {
            $event->recalculateProgress();
        });
    }

    public function recalculateProgress(): void
    {
        $sessions = $this->sessions_count ?? 0;
        if ($sessions <= 0) {
            return;
        }

        $topicsCount = $this->topics()->count();
        $progress = (int) round(($topicsCount / $sessions) * 100);
        $progress = min($progress, 100);

        if ($this->progress_percentage !== $progress) {
            $this->updateQuietly(['progress_percentage' => $progress]);
        }
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function participants(): HasMany
    {
        return $this->hasMany(EventParticipant::class);
    }

    public function topics(): HasMany
    {
        return $this->hasMany(EventTopic::class);
    }
}
