<?php

namespace Database\Seeders;

use App\Models\Competition;
use App\Models\Game;
use App\Models\Tournament;
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
        $user = User::factory()->create([
            'name' => 'Jojo',
            'email' => 'jo@jo2.ch'
        ]);
        $competition = Competition::create([
            'name' => 'Championnat des légendes'
        ]);
        $tournament = Tournament::create([
            'competition_id' => $competition->id,
            'host_id' => $user->id,
            'place' => 'Collège des Crêtets',
            'start_date' => now()
        ]);
        Game::create([
            'tournament_id' => $tournament->id,
            'player_1_id' => $user->id,
            'player_2_id' => User::factory()->create()->id
        ]);
    }
}
