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
        $userIds = User::pluck('id');

        Hero::factory()
            ->sequence(
                [
                    'hero_alias' => 'Pyroclast',
                    'superpower' => 'Control over fire',
                    'elo_rating' => 1850,
                    'profile_picture' => 'hero-profile-pictures/pyroclast.png',
                    'user_id' => $userIds->pop(),
                ],
                [
                    'hero_alias' => 'Aeromaster',
                    'superpower' => 'Manipulate wind',
                    'elo_rating' => 1780,
                    'profile_picture' => 'hero-profile-pictures/aeromaster.png',
                    'user_id' => $userIds->pop(),
                ],
                [
                    'hero_alias' => 'Titan Guard',
                    'superpower' => 'Superhuman strength and durability',
                    'elo_rating' => 1920,
                    'profile_picture' => 'hero-profile-pictures/titan-guard.png',
                    'user_id' => $userIds->pop(),
                ],
                [
                    'hero_alias' => 'Phantom Veil',
                    'superpower' => 'Invisibility',
                    'elo_rating' => 1700,
                    'profile_picture' => 'hero-profile-pictures/phantom-veil.png',
                    'user_id' => $userIds->pop(),
                ],
                [
                    'hero_alias' => 'Thunderstrike',
                    'superpower' => 'Control over electricity',
                    'elo_rating' => 1820,
                    'profile_picture' => 'hero-profile-pictures/thunderstrike.png',
                    'user_id' => $userIds->pop(),
                ],
                [
                    'hero_alias' => 'Mindwave',
                    'superpower' => 'Telekinetic abilities',
                    'elo_rating' => 1760,
                    'profile_picture' => 'hero-profile-pictures/mindwave.png',
                    'user_id' => $userIds->pop(),
                ],
                [
                    'hero_alias' => 'Blitz Runner',
                    'superpower' => 'Super speed',
                    'elo_rating' => 1890,
                    'profile_picture' => 'hero-profile-pictures/blitzrunner.png',
                    'user_id' => $userIds->pop(),
                ],
            )
        ->create();

        Hero::factory(count($userIds))
            ->sequence(fn (Sequence $sequence) => [ 'user_id' => $userIds->pop() ])
            ->create();
    }
}
