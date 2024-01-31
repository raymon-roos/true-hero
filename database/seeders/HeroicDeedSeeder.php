<?php

namespace Database\Seeders;

use App\Models\Hero;
use App\Models\HeroicDeed;
use App\Models\Threat;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class HeroicDeedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $heroIds = Hero::pluck('id')->all();
        $threatIds = Threat::pluck('id')->all();

        HeroicDeed::factory(100)
            ->sequence(fn (Sequence $sequence) => [
                'hero_id' => $heroIds[array_rand($heroIds)],
                'threat_id' => $threatIds[array_rand($threatIds)],
            ])
            ->create();
    }
}
