<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAvatarRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avatar_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('avatar_id')->unsigned();
            $table->timestamps();
            $table->unique(['user_id', 'avatar_id']);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('avatar_id')->references('id')->on('avatars');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('avatar_user');
    }
}
