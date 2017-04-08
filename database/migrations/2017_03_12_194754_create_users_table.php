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
            $table->string('first_name');
            $table->string('surname');
            $table->string('phone_number')->unique();
            $table->string('email')->unique();
            $table->date('birth_day');
            $table->integer('role');
            $table->string('password');
            $table->integer('kaya_id')->unsigned()->index();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('kaya_id')->references('id')->on('kayas');
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
