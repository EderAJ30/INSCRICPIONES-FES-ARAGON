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
        Schema::create('Aula', function (Blueprint $table) {
            $table->increments('id_aula');
            $table->string('nombre_aula', 50);
            $table->string('edificio', 50);
            $table->unsignedInteger('capacidad_maxima');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Aula');
    }
};
