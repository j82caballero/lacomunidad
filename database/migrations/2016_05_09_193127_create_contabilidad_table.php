<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContabilidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contabilidad', function (Blueprint $table) {
            $table->increments('id');

            $table->date('fecha');
            $table->decimal('importe',6,2);
            $table->mediumText('comentario')->nullable();

            $table->enum('tipo', ['ingreso','gasto']);

            // Relación con concepto
            $table->integer('conceptos_id')->unsigned()->nullable();
            $table->foreign('conceptos_id')->references('id')->on('conceptos');

            // Relación con tipos pagos
            $table->integer('tipospagos_id')->unsigned()->nullable();
            $table->foreign('tipospagos_id')->references('id')->on('tipospagos');

            // Relación con propiedades
            $table->integer('propietario_id')->unsigned()->nullable();
            $table->foreign('propietario_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            // Relación con comunidad
            $table->integer('comunidad_id')->unsigned()->nullable();
            $table->foreign('comunidad_id')->references('id')->on('comunidad');

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
        Schema::drop('contabilidad');
    }
    
}
