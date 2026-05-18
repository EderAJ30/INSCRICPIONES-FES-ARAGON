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
        Schema::create('Grupo', function (Blueprint $table) {
            $table->increments('id_grupo');
            $table->string('nombre_grupo', 10);
            $table->unsignedInteger('id_asignatura')->index('fk_grupo_asignatura');
            $table->unsignedInteger('id_profesor')->index('fk_grupo_profesor');
            $table->unsignedInteger('id_periodo')->index('fk_grupo_periodo');
            $table->unsignedInteger('semestre_nivel');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Grupo');
    }
};
