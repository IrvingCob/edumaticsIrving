<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTelefonosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telefonos', function (Blueprint $table) {
            $table->increments('idtelefono');
            $table->timestamps();
            $table->string('consecutivo')->nullable();
            $table->string('numero')->nullable();
            $table->string('persona_idpersona')->nullable();
            $table->string('tipoTelefono_idtipoTelefono')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('telefonos');
    }
}
