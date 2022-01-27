<?php

namespace Database\Seeders;

use App\Models\Competition;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create(['name' => 'Jojo', 'email' => 'jo@jo2.ch']);
        Competition::factory()->create(['name' => 'Championnat des légendes']);
    }
}
