<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKifusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kifus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sente_id');
            $table->integer('gote_id');
            $table->boolean('sente_win');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('kifus');
    }
}
