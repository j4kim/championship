<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    public function player1() {
        return $this->hasOne(User::class, 'id', 'player_1_id');
    }

    public function player2() {
        return $this->hasOne(User::class, 'id', 'player_2_id');
    }
}
