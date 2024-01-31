<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Duel extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function firstHero(): BelongsTo
    {
        return $this->belongsTo(Hero::class, foreignKey: 'hero_1_id');
    }

    public function secondHero(): BelongsTo
    {
        return $this->belongsTo(Hero::class, foreignKey: 'hero_2_id');
    }

    public function winner(): BelongsTo
    {
        return $this->belongsTo(Hero::class, foreignKey: 'winner_id');
    }

    public function reviews(): MorphMany
    {
        return $this->morphMany(Review::class, 'reviewable');
    }
}
