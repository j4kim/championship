<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('number')->default(1);
            $table->foreignId('tournament_id')->constrained();
            $table->unique(['tournament_id', 'number']);
            $table->foreignId('player_1_id')->constrained('participants');
            $table->foreignId('player_2_id')->constrained('participants');
            $table->integer('player_1_score')->default(0);
            $table->integer('player_2_score')->default(0);
            $table->boolean('played')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matches');
    }
}
