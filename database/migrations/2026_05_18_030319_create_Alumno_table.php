<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Alumno', function (Blueprint $table) {
            $table->increments('id_alumno');
            $table->string('numero_cuenta', 10)->unique('numero_cuenta');
            $table->string('nombre', 50);
            $table->string('apellido_paterno', 50);
            $table->string('apellido_materno', 50)->nullable();
            $table->string('correo_institucional', 100)->unique('correo_institucional');
            $table->unsignedInteger('semestre_inscrito');
            $table->string('turno', 20);
            $table->unsignedInteger('anio_ingreso');
            $table->decimal('promedio', 3, 1)->nullable()->comment('Campo desnormalizado por rendimiento');
            $table->integer('estatus_academico');
            $table->char('sexo', 1);
            $table->unsignedInteger('id_carrera')->index('fk_alumno_carrera');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Alumno');
    }
};
