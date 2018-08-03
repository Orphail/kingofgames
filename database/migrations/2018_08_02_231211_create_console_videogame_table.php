<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsoleVideogameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('console_videogame', function (Blueprint $table) {
            $table->unsignedInteger('console_id');
            $table->unsignedInteger('videogame_id');
            $table->foreign('console_id')->references('id')->on('consoles')->onDelete('cascade');
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
        Schema::dropIfExists('console_videogame');
    }
}
