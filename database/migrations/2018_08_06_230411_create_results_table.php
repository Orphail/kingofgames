<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tournament_player_id')->nullable();
            $table->unsignedInteger('tournament_game_id')->nullable();
            $table->timestamps();
            $table->foreign('tournament_player_id')->references('id')->on('tournament_players')->onDelete('cascade');
            $table->foreign('tournament_game_id')->references('id')->on('tournament_games')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('results');
    }
}
