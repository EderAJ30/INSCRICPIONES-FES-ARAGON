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
        Schema::create('ComprobanteInscripcion', function (Blueprint $table) {
            $table->increments('id_comprobante');
            $table->string('folio_verificacion', 40)->unique('folio_verificacion');
            $table->unsignedInteger('id_alumno')->index('fk_comprobante_alumno');
            $table->unsignedInteger('id_periodo')->index('fk_comprobante_periodo');
            $table->timestamp('fecha_emision')->useCurrent();
            $table->string('sello_digital');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ComprobanteInscripcion');
    }
};
