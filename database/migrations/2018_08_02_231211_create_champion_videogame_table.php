<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChampionVideogameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('champion_videogame', function (Blueprint $table) {
            $table->unsignedInteger('champion_id');
            $table->unsignedInteger('videogame_id');
            $table->foreign('champion_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('videogame_id')->references('id')->on('videogames')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('champion_videogame');
    }
}
