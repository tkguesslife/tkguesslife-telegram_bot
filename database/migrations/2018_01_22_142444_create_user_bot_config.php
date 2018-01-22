<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserBotConfig extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_bot_config', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bot_token');
            $table->string('default_currency');
            $table->string('webhook_url');
            $table->integer('user_id')->unsigned();;
            $table->timestamps();

        });

        Schema::table('user_bot_config', function($table) {
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
        Schema::drop('user_bot_config');
    }
}
