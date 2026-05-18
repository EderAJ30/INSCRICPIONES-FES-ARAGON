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
        Schema::create('Asignatura', function (Blueprint $table) {
            $table->increments('id_asignatura');
            $table->string('clave_asignatura', 10)->unique('clave_asignatura');
            $table->string('nombre_asignatura', 100);
            $table->unsignedInteger('creditos_asignatura');
            $table->unsignedInteger('creditos_laboratorio');
            $table->string('tipo_asignatura', 20);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Asignatura');
    }
};
