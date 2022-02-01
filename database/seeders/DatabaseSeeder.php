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
        $jojo = User::factory()->create([
            'name' => 'Jojo',
            'email' => 'jo@jo2.ch'
        ]);
        $xaxa = User::factory()->create([ 'name' => 'Xaxa', ]);
        $titi = User::factory()->create([ 'name' => 'Titi', ]);
        $competition = Competition::create([ 'name' => 'Championnat des légendes' ]);
        $tournament = Tournament::create([
            'competition_id' => $competition->id,
            'host_id' => $xaxa->id,
            'spot' => 'Collège des Crêtets',
            'start_date' => '2022-01-07',
            'menu' => 'Pâtes au poulet et petits pois, cake à la patate douce',
            'conditions' => "Verglas sur la table et sur le sol, conditions extrêmes.\nMétéo: neige, froid."
        ]);
        $tournament->participants()->createMany([
            ['user_id' => 1],
            ['user_id' => 2],
            ['user_id' => 3]
        ]);
        $tournament->games()->createMany([
            [
                'player_1_id' => $titi->id,
                'player_1_score' => 11,
                'player_2_id' => $jojo->id,
                'player_2_score' => 8,
                'played' => true
            ],
            [
                'player_1_id' => $xaxa->id,
                'player_2_id' => $titi->id,
            ]
        ]);
    }
}
