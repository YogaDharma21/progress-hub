<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Resource extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'type',
        'tags',
        'file_path',
        'cover_image',
        'views_count',
        'created_by',
        'approval_status',
        'rejection_reason',
    ];

    protected $casts = [
        'approval_status' => 'string',
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function chapters(): HasMany
    {
        return $this->hasMany(ResourceChapter::class);
    }

    public function submissions(): MorphMany
    {
        return $this->morphMany(Submission::class, 'submittable');
    }
}
