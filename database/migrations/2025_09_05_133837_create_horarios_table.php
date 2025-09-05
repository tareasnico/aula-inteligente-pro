<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   // database/migrations/xxxx_xx_xx_xxxxxx_create_horarios_table.php
public function up(): void
{
    Schema::create('horarios', function (Blueprint $table) {
        $table->id();
        $table->string('codigo')->unique();
        $table->string('dia'); // Ej: Lunes, Martes...
        $table->string('turno'); // Ej: Mañana, Tarde, Noche
        $table->string('periodo')->nullable(); // Ej: Receso
        $table->time('hora_inicio');
        $table->time('hora_fin');
        $table->boolean('necesita_reserva')->default(true);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
};
