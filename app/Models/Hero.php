<?php

namespace App\Models;

use App\Enums\HeroRating;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Hero extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'hero_rating' => HeroRating::class,
    ];

    public static function search(string $search): Collection
    {
        return self::query()
            ->where(
                fn (Builder $query) => $query
                ->where('hero_alias', 'like', $search)
                ->orWhereRelation('user', 'first_name', 'like', $search)
                ->orWhereRelation('user', 'last_name', 'like', $search)
            )
            ->limit(50)
            ->get();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function eligibleOpponents(): HasMany
    {
        return $this->hasMany(Hero::class); // this doesn't do anything, it's just to trick filament
    }

    public function heroicDeeds(): HasMany
    {
        return $this->hasMany(HeroicDeed::class);
    }

    public function reviews(): MorphMany
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    public function reviewers(): HasManyThrough
    {
        return $this->hasManyThrough(User::class, Review::class, 'reviewable_id', 'id', 'id', 'reviewer_id')
            ->where('reviewable_type', $this::class);
    }
}
