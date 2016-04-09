<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFriendsRequestRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('friends_request', function (Blueprint $table) {
            $table->integer('requesting_id')->unsigned();
            $table->integer('pending_id')->unsigned();
            $table->timestamps();
            $table->unique(['requesting_id', 'pending_id']);
            $table->foreign('requesting_id')->references('id')->on('users');
            $table->foreign('pending_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('friends_request');
    }
}
