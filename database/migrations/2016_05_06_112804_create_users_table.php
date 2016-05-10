<?php

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
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('email')->unique();
            $table->string('password');

            $table->string('dni',8);
            $table->string('telefono',9);
            $table->mediumText('observaciones');
            $table->enum('perfil',['admin','user'])->default('user');

            // Confirmación email
            $table->string('registration_token')->nullable();

            // Datos de la relación con propiedades
            $table->boolean('vive_aqui')->default('0')->nullable();
            $table->boolean('contacto_principal')->default('0')->nullable();
            $table->boolean('dueno')->default('0')->nullable();

            // Relación con comunidad
            $table->integer('comunidad_id')->unsigned()->nullable();
            $table->foreign('comunidad_id')->references('id')->on('comunidad');

            // Relación con tipos pagos
            $table->integer('tipospagos_id')->unsigned()->nullable();
            $table->foreign('tipospagos_id')->references('id')->on('tipospagos');

            $table->rememberToken();
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
        Schema::drop('users');
    }
}
