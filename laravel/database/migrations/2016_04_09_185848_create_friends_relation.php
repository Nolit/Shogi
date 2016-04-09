<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFriendsRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('friends', function (Blueprint $table) {
            $table->integer('requested_id')->unsigned();
            $table->integer('accepted_id')->unsigned();
            $table->timestamps();
            $table->unique(['requested_id', 'accepted_id']);
            $table->foreign('requested_id')->references('id')->on('users');
            $table->foreign('accepted_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('friends');
    }
}
