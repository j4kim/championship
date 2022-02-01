<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;

    protected $casts = [
        'start_date' => 'date:d.m.Y',
        'pictures' => 'array'
    ];

    public function competition() {
        return $this->belongsTo(Competition::class);
    }

    public function games() {
        return $this->hasMany(Game::class);
    }

    public function participants() {
        return $this->hasMany(Participant::class);
    }

    public function host() {
        return $this->belongsTo(User::class);
    }

    public function getRankingAttribute() {
        $sorted = $this->participants->sortByDesc(function($participant){
            return $participant->rankingScore;
        })->values();
        foreach ($sorted as $index => $current) {
            $current->rank = $index + 1;
            if ($index > 0) {
                $previous = $sorted[$index - 1];
                if ($previous->rankingScore === $current->rankingScore) {
                    $current->rank = $previous->rank;
                }
            }
        }
        return $sorted;
    }
}
