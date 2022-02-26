<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id('id_pacientes');
            $table->string('nombre');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->enum('genero', ["Hombre", "Mujer"]);
            $table->integer('edad');
            $table->string('foto');
            $table->string('calle');
            $table->integer('numero');
            $table->string('codigo_postal');
            $table->string('municipio');
            $table->string('telefono');
            $table->string('correo')->unique();
            $tavle->string('contraseña');
            $table->string('rfc');
            $table->string('estatus');
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
        //
    }
};
