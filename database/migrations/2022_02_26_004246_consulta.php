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
        Schema::create('consulta', function (Blueprint $table) {
            $table->id('id_consulta');
            $table->string('id_cita');
            $table->string('nombre_paciente');
            $table->string('apellido_paterno_paciente');
            $table->string('apellido_materno_paciente');
            $table->string('estatura');
            $table->string('peso');
            $table->string('temperatura');
            $table->string('alergias');
            $table->text('sintomas');
            $table->string('diagnostico');
            $table->text('medicamentos_recetados');
            $table->string('observaciones');
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
        Schema::dropIfExists('consulta');
    }
};
