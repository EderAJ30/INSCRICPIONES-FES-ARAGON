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
        Schema::create('PeriodoEscolar', function (Blueprint $table) {
            $table->increments('id_periodo');
            $table->string('nombre_periodo', 20)->unique('nombre_periodo');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->boolean('estatus_activo')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PeriodoEscolar');
    }
};
