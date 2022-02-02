<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    use HasFactory;

    public function tournaments() {
        return $this->hasMany(Tournament::class);
    }

    public function results() {
        return $this->hasMany(Result::class);
    }

    public function getStandingsAttribute() {
        $resultSumByUser = $this->results()
            ->with('user')
            ->selectRaw('sum(points) as points, user_id')
            ->groupBy('user_id')
            ->get()
            ->sortByDesc('points')
            ->values();

        foreach ($resultSumByUser as $index => $current) {
            $current->rank = $index + 1;
            if ($index > 0) {
                $previous = $resultSumByUser[$index - 1];
                if ($previous->points == $current->points) {
                    $current->rank = $previous->rank;
                }
            }
        }
        return $resultSumByUser;
    }
}
