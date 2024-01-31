<?php

namespace Database\Factories;

use App\Enums\HeroRating;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hero>
 */
class HeroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'hero_alias' => fake()->unique()->userName(),
            'superpower' => fake()->word(),
            'emergency_contact' => fake()->unique()->phoneNumber(),
            'backstory' => fake()->realTextBetween(200, 600),
            'motivation' => fake()->realTextBetween(100, 400),
            'elo_rating' => fake()->numberBetween(1000, 1600),
            'hero_rating' => fake()->randomElement(HeroRating::cases())
        ];
    }
}
