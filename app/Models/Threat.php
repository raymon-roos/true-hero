<?php

namespace App\Models;

use App\Enums\ThreatLevel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Threat extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'level' => ThreatLevel::class,
    ];


    public function nefariousActions(): HasMany
    {
        // Threats aren't heroic of course, they're the adversary in this situation
        return $this->hasMany(HeroicDeed::class);
    }
}
