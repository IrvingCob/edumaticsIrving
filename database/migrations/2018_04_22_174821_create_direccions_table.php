<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDireccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direccions', function (Blueprint $table) {
            $table->increments('iddireccion');
            $table->timestamps();
            $table->string('consecutivo')->nullable();
            $table->string('tipo');
            $table->string('calle')->nullable();
            $table->string('numero')->nullable();
            $table->string('colonia')->nullable();
            $table->string('ciudad')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('direccions');
    }
}
