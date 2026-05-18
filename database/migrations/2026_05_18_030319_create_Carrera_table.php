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
        Schema::create('Carrera', function (Blueprint $table) {
            $table->increments('id_carrera');
            $table->string('nombre_carrera', 100)->unique('nombre_carrera');
            $table->string('sistema', 30);
            $table->unsignedInteger('creditos_obligatorios');
            $table->unsignedInteger('creditos_optativos');
            $table->unsignedInteger('limite_semestres');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Carrera');
    }
};
