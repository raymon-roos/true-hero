<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Review extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function reviewable(): MorphTo
    {
        return $this->morphTo();
    }

    public function reviewer(): BelongsTo
    {
        return $this->belongsTo(User::class, foreignKey: 'reviewer_id');
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(ReviewStatus::class, foreignKey: 'review_status_id');
    }
}
