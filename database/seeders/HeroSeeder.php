<?php

namespace Database\Seeders;

use App\Enums\HeroRating;
use App\Models\Hero;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $heroRatings = HeroRating::cases();
        shuffle($heroRatings);

        $userIds = User::where('is_admin', false)
            ->inRandomOrder()
            ->pluck('id')
            ->all();

        Hero::factory(count($userIds))
            ->sequence(fn (Sequence $sequence) => [ 'user_id' => $userIds[$sequence->index] ])
            ->create();
    }
}
