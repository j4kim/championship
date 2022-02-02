<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;

    protected $casts = [
        'date' => 'date:Y-m-d',
        'pictures' => 'array'
    ];

    protected $appends = ['formattedDate'];

    protected $fillable = ['host_id', 'date'];

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

    public function getFormattedDateAttribute() {
        return $this->date->format('d.m.Y');
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
            $current->champPoints = match ($current->rank) {
                1 => 6,
                2 => 3,
                3 => 1,
                default => 0
            };
        }
        return $sorted;
    }
}
