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
            $table->integer('street_id')->unsigned()->index();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('street_id')->references('id')->on('streets')->onDelete('cascade');
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
