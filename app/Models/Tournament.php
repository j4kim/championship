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
}
