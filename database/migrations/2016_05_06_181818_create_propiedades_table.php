<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropiedadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propiedades', function (Blueprint $table) {
            $table->increments('id');

            $table->string('codigo', 10)->unique();
            $table->string('descripcion');

            // Relación con tipos propiedades
            $table->integer('tipospropiedades_id')->unsigned();
            $table->foreign('tipospropiedades_id')->references('id')->on('tipospropiedades');

            // Relación con propiedades
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            // Relación con garajes
            $table->integer('garaje_id')->unsigned()->nullable();
            $table->foreign('garaje_id')->references('id')->on('garajes');

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
        Schema::drop('propiedades');
    }
}
