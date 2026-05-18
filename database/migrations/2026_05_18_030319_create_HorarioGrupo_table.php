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
        Schema::create('HorarioGrupo', function (Blueprint $table) {
            $table->increments('id_horario');
            $table->unsignedInteger('id_grupo')->index('fk_horario_grupo');
            $table->unsignedInteger('id_aula')->index('fk_horario_aula');
            $table->unsignedTinyInteger('dia_semana')->comment('1=Lunes, 2=Martes, 3=Miércoles, 4=Jueves, 5=Viernes, 6=Sábado');
            $table->time('hora_inicio');
            $table->time('hora_fin');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('HorarioGrupo');
    }
};
