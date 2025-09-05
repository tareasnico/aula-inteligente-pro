<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
// database/migrations/xxxx_xx_xx_xxxxxx_create_aire_acondicionados_table.php
public function up(): void
{
    // Nombre de tabla personalizado para que sea más simple
    Schema::create('aire_acondicionado', function (Blueprint $table) {
        $table->id();
        $table->string('marca_modelo');
        $table->string('estado'); // Ej: apagado, encendido, mantenimiento
        $table->date('mantenimiento')->nullable(); // Próxima fecha de mantenimiento
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aire_acondicionados');
    }
};
