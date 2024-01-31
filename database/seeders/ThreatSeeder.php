<?php

namespace Database\Seeders;

use App\Models\Threat;
use Illuminate\Database\Seeder;

class ThreatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Threat::factory(30)
            ->create();
    }
}
