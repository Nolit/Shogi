<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();;
            $table->integer('rate')->default(1000);
            $table->integer('winNum')->default(0);
            $table->integer('loseNum')->default(0);
            $table->integer('drawNum')->default(0);
            $table->integer('connectionLossNum')->default(0);
            $table->date('lastConnectionLoss')->nullable();
            $table->integer('winStreak')->default(0);
            $table->integer('loseStreak')->default(0);
            $table->integer('maxWinStreak')->default(0);
            $table->string('class')->default('10級');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('records');
    }
}
