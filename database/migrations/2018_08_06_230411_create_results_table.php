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
            $table->string('nickname')->unique();
            $table->unsignedInteger('tournament_id')->nullable();
            $table->unsignedInteger('videogame_id')->nullable();
            $table->integer('score')->nullable();
            $table->integer('evaluation')->nullable();
            $table->timestamps();
            $table->foreign('tournament_id')->references('id')->on('tournaments')->onDelete('cascade');
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
        Schema::dropIfExists('results');
    }
}
