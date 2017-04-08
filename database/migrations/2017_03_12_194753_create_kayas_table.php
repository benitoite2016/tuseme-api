

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKayasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kayas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('details');
            $table->integer('street_id')->unsigned()->index();
            $table->timestamps();
            $table->foreign('street_id')->references('id')->on('streets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kayas');
    }
}
