<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcceptedPetitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accepted_petitions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('leader_id')->unsigned()->index();
            $table->integer('petition_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('leader_id')->references('id')->on('leaders')->onDelete('cascade');
            $table->foreign('petition_id')->references('id')->on('petitions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accepted_petitions');
    }
}
