<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Duel;

class EloRatingUpdater
{
    /**
     * This is like, a whole thing. Just refer to
     * https://en.wikipedia.org/wiki/Elo_rating_system#Theory
     * if you want to understand.
     */
    public static function updateHeroRatings(Duel $duel)
    {
        $hero1Elo = $duel->firstHero->elo_rating;
        $hero2Elo = $duel->secondHero->elo_rating;

        $hero1ExpectedScore = self::calculateExpectedScore($hero1Elo, $hero2Elo);
        $hero2ExpectedScore = self::calculateExpectedScore($hero2Elo, $hero1Elo);

        $hero1ActualScore = self::determineActualScore($duel->winner_id, $duel->hero_1_id);
        $hero2ActualScore = self::determineActualScore($duel->winner_id, $duel->hero_2_id);

        $duel->firstHero->update(['elo_rating' => self::calculateNewElo(
            $hero1Elo,
            $hero1ExpectedScore,
            $hero1ActualScore
        )]);
        $duel->secondHero->update(['elo_rating' => self::calculateNewElo(
            $hero2Elo,
            $hero2ExpectedScore,
            $hero2ActualScore
        )]);
    }

    private static function calculateExpectedScore(int $eloA, int $eloB): float
    {
        return round(1 / ( 1 + ((10 ** (($eloB - $eloA) / 400))) ), 4);
    }

    private static function calculateNewElo(
        int $oldElo,
        float $expectedScore,
        float $actualScore
    ): int {
        return intval(
            $oldElo + (self::determineKFactor($oldElo)
                * ($actualScore - $expectedScore))
        );
    }

    private static function determineKFactor(float $elo): int
    {
        return match (true) {
            $elo > 1400 => 16,
            $elo >= 1100 => 24,
            $elo < 1100 => 32,
        };
    }

    private static function determineActualScore(?int $winnerId, int $heroId): int
    {
        return is_null($winnerId)
            ? 0.5
            : ($winnerId === $heroId ? 1 : 0);
    }
}
