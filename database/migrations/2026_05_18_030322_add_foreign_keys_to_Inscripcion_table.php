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
        Schema::table('Inscripcion', function (Blueprint $table) {
            $table->foreign(['id_alumno'], 'fk_inscripcion_alumno')->references(['id_alumno'])->on('Alumno')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign(['id_grupo'], 'fk_inscripcion_grupo')->references(['id_grupo'])->on('Grupo')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Inscripcion', function (Blueprint $table) {
            $table->dropForeign('fk_inscripcion_alumno');
            $table->dropForeign('fk_inscripcion_grupo');
        });
    }
};
