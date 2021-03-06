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
        Schema::create('citas', function (Blueprint $table) {
            $table->id('id_cita');
            $table->string('id_paciente');
            $table->string('id_doctor');
            $table->string('curp_paciente');
            $table->string('id_especialidad');
            $table->string('folio');
            $table->string('estatus_cita');
            $table->date('fecha_cita');
            $table->string('hora_cita');
            $table->string('id_consultorio');
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
        Schema::dropIfExists('citas');
    }
};
