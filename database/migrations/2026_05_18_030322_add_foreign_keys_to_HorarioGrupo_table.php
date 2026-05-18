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
        Schema::table('HorarioGrupo', function (Blueprint $table) {
            $table->foreign(['id_aula'], 'fk_horario_aula')->references(['id_aula'])->on('Aula')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign(['id_grupo'], 'fk_horario_grupo')->references(['id_grupo'])->on('Grupo')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('HorarioGrupo', function (Blueprint $table) {
            $table->dropForeign('fk_horario_aula');
            $table->dropForeign('fk_horario_grupo');
        });
    }
};
