<?php

namespace Database\Factories;

use App\Enums\ThreatLevel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Threat>
 */
class ThreatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->userName(),
            'level' => fake()->randomElement(ThreatLevel::cases())
        ];
    }
}
