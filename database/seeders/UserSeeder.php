<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(30)
            ->sequence(['is_admin' => true], ['is_admin' => false])
            ->create();

        User::factory(1)->create([
            'username' => 'test',
            'email' => 't@t',
            'password' => Hash::make('test'),
        ]);
    }
}
