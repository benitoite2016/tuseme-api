<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStreetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('streets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('street_details_id')->unsigned()->index();
            $table->integer('admin_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('admin_id')->references('id')->on('admins');
            $table->foreign('street_details_id')->references('id')->on('street_details')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('streets');
    }
}


