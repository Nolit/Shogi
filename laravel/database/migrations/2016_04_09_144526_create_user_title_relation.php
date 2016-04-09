<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTitleRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('title_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('title_id')->unsigned();
            $table->timestamps();
            $table->unique(['user_id', 'title_id']);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('title_id')->references('id')->on('titles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('title_user');
    }
}
