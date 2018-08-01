<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nickname');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('image');
            $table->unsignedInteger('rank_id')->nullable();
            $table->integer('akogp');
            $table->integer('kog_points');
            $table->integer('total_points');
            $table->boolean('newsletter')->default(0);
            $table->boolean('disabled')->default(0);
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('rank_id')->references('id')->on('ranks')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
