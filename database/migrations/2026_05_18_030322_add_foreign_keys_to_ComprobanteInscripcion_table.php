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
        Schema::table('ComprobanteInscripcion', function (Blueprint $table) {
            $table->foreign(['id_alumno'], 'fk_comprobante_alumno')->references(['id_alumno'])->on('Alumno')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign(['id_periodo'], 'fk_comprobante_periodo')->references(['id_periodo'])->on('PeriodoEscolar')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ComprobanteInscripcion', function (Blueprint $table) {
            $table->dropForeign('fk_comprobante_alumno');
            $table->dropForeign('fk_comprobante_periodo');
        });
    }
};
