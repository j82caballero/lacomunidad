<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComunidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comunidad', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nombre');
            $table->string('cif')->unique();
            $table->string('direccion');
            $table->string('provincia');
            $table->string('poblacion');
            $table->string('codpostal', 5);
            $table->string('image')->default('img/comunidad_avatar.jpg');
            $table->mediumText('descripcion')->nullable();

            $table->tinyInteger('paso_registro')->default('1');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comunidad');
    }
}
