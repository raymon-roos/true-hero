<?php

namespace Database\Seeders;

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
        $userIds = User::where('is_admin', false)
            ->inRandomOrder()
            ->pluck('id')
            ->all();

        Hero::factory(count($userIds))
            ->sequence(fn (Sequence $sequence) => [ 'user_id' => $userIds[$sequence->index] ])
            ->create();

        Hero::factory()
            ->sequence([
                    [
                        'hero_alias' => 'Pyroclast',
                        'superpower' => 'Control over fire',
                        'elo_rating' => 1850,
                        'image_path' => '/img/pyroclast.png'
                    ],
                    [
                        'hero_alias' => 'Aeromaster',
                        'superpower' => 'Manipulate wind',
                        'elo_rating' => 1780,
                        'image_path' => '/img/aeromaster.png'
                    ],
                    [
                        'hero_alias' => 'Titan Guard',
                        'superpower' => 'Superhuman strength and durability',
                        'elo_rating' => 1920,
                        'image_path' => '/img/titan-guard.png'
                    ],
                    [
                        'hero_alias' => 'Phantom Veil',
                        'superpower' => 'Invisibility',
                        'elo_rating' => 1700,
                        'image_path' => '/img/phantom-veil.png'
                    ],
                    [
                        'hero_alias' => 'Thunderstrike',
                        'superpower' => 'Control over electricity',
                        'elo_rating' => 1820,
                        'image_path' => '/img/thunderstrike.png'
                    ],
                    [
                        'hero_alias' => 'Mindwave',
                        'superpower' => 'Telekinetic abilities',
                        'elo_rating' => 1760,
                        'image_path' => '/img/mindwave.png'
                    ],
                    [
                        'hero_alias' => 'Blitz Runner',
                        'superpower' => 'Super speed',
                        'elo_rating' => 1890,
                        'image_path' => '/img/blitzrunner.png'
                    ],
            ]);
    }
}
