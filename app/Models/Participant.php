<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{

    public $timestamps = false;

    protected $fillable = ['user_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function tournament() {
        return $this->belongsTo(Tournament::class);
    }

    public function getGamesAttribute() {
        return $this->tournament->games->filter(fn($g) =>
            $g->played && ($g->player_1_id == $this->id || $g->player_2_id == $this->id)
        );
    }

    public function getGamesWonAttribute() {
        return $this->games->filter(fn($g) =>
            $g->player_1_id == $this->id ? $g->player_1_wins : $g->player_2_wins
        );
    }

    public function getWinsAttribute() {
        return $this->gamesWon->count();
    }

    public function getPointsAttribute() {
        return $this->games->sum(fn($g) =>
            $g->player_1_id == $this->id ? $g->player_1_score : $g->player_2_score
        );
    }

    public function getGamesPlayedAttribute() {
        return $this->games->count();
    }

    public function getPointsAgainstAttribute() {
        return $this->games->sum(fn($g) =>
            $g->player_1_id === $this->id ? $g->player_2_score : $g->player_1_score
        );
    }

    public function getDiffAttribute() {
        return $this->points - $this->pointsAgainst;
    }

    public function getRankingScoreAttribute() {
        return $this->wins * 1000 + $this->points; // + ($this->diff/1000);
    }
}
