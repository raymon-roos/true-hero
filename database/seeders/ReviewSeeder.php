<?php

namespace Database\Seeders;

use App\Models\Hero;
use App\Models\HeroicDeed;
use App\Models\Review;
use App\Models\ReviewStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminIds = User::whereIsAdmin(true)->pluck('id')->all();
        $heroIds = Hero::pluck('id')->all();
        $heroicDeedIds = HeroicDeed::pluck('id')->all();
        $reviewStatusIds = ReviewStatus::pluck('id')->all();
        $reviewableTypes = [Hero::class, HeroicDeed::class];

        Review::factory(300)
            ->sequence(fn (Sequence $sequence) => [
                'reviewer_id' => $adminIds[array_rand($adminIds)],
                'reviewable_type' => $reviewablType = $reviewableTypes[array_rand($reviewableTypes)],
                'reviewable_id' => match ($reviewablType) {
                    Hero::class => $heroIds[array_rand($heroIds)],
                    HeroicDeed::class => $heroicDeedIds[array_rand($heroicDeedIds)],
                },
                'review_status_id' => $reviewStatusIds[array_rand($reviewStatusIds)],
            ])
            ->create();
    }
}
