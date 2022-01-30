<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $appends = ['player_1_wins', 'player_2_wins'];


    public function player1() {
        return $this->hasOne(User::class, 'id', 'player_1_id');
    }

    public function player2() {
        return $this->hasOne(User::class, 'id', 'player_2_id');
    }

    public function getPlayer1WinsAttribute() {
        return $this->player_1_score > $this->player_2_score;
    }

    public function getPlayer2WinsAttribute() {
        return $this->player_2_score > $this->player_1_score;
    }
}
