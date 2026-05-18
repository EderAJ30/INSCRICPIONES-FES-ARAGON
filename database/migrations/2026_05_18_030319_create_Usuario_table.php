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
        Schema::create('Usuario', function (Blueprint $table) {
            $table->increments('id_usuario');
            $table->string('correo_electronico', 100)->unique('correo_electronico');
            $table->string('contrasena_hash');
            $table->unsignedInteger('id_rol')->index('fk_usuario_rol');
            $table->unsignedInteger('asociable_id')->nullable();
            $table->string('asociable_type', 50)->nullable();

            $table->index(['asociable_type', 'asociable_id'], 'idx_usuario_asociable');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Usuario');
    }
};
