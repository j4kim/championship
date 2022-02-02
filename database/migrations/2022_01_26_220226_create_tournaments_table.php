<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTournamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournaments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('competition_id')->constrained();
            $table->date('date')->nullable()->useCurrent();
            $table->foreignId('host_id')->constrained('users');
            $table->string('spot')->nullable();
            $table->text('menu')->nullable();
            $table->text('conditions')->nullable();
            $table->json('pictures')->default('[]');
            $table->boolean('finished')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tournaments');
    }
}
