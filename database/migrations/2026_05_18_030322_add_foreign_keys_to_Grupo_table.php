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
        Schema::table('Grupo', function (Blueprint $table) {
            $table->foreign(['id_asignatura'], 'fk_grupo_asignatura')->references(['id_asignatura'])->on('Asignatura')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign(['id_periodo'], 'fk_grupo_periodo')->references(['id_periodo'])->on('PeriodoEscolar')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign(['id_profesor'], 'fk_grupo_profesor')->references(['id_profesor'])->on('Profesor')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Grupo', function (Blueprint $table) {
            $table->dropForeign('fk_grupo_asignatura');
            $table->dropForeign('fk_grupo_periodo');
            $table->dropForeign('fk_grupo_profesor');
        });
    }
};
