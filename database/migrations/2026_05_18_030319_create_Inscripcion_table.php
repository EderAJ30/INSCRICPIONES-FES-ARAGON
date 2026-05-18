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
        Schema::create('Inscripcion', function (Blueprint $table) {
            $table->increments('id_inscripcion');
            $table->unsignedInteger('id_alumno');
            $table->unsignedInteger('id_grupo')->index('fk_inscripcion_grupo');
            $table->timestamp('fecha_inscripcion')->useCurrent();
            $table->decimal('calificacion_final', 4)->nullable();
            $table->string('estatus_inscripcion', 20)->default('Regular')->comment('Regular, Baja, Pendiente');

            $table->unique(['id_alumno', 'id_grupo'], 'uq_alumno_grupo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Inscripcion');
    }
};
