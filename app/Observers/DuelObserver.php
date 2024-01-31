<?php

namespace App\Observers;

use App\Models\Duel;
use App\Services\EloRatingUpdater;

class DuelObserver
{
    /**
     * Handle the Duel "created" event.
     */
    public function created(Duel $duel): void
    {
        EloRatingUpdater::updateHeroRatings($duel);
    }

    /**
     * Handle the Duel "updated" event.
     */
    public function updated(Duel $duel): void
    {
        //
    }

    /**
     * Handle the Duel "deleted" event.
     */
    public function deleted(Duel $duel): void
    {
        //
    }

    /**
     * Handle the Duel "restored" event.
     */
    public function restored(Duel $duel): void
    {
        //
    }

    /**
     * Handle the Duel "force deleted" event.
     */
    public function forceDeleted(Duel $duel): void
    {
        //
    }
}
