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
        Schema::create('historial_uso_aire_acondicionado', function (Blueprint $table) {
            $table->id();

            // Relación: El registro pertenece a un equipo de aire acondicionado
            $table->foreignId('aire_acondicionado_id')->constrained('aire_acondicionado')->onDelete('cascade');
            
            $table->date('fecha');
            $table->time('hora_inicio');
            $table->time('hora_fin')->nullable(); // Puede ser nulo si sigue encendido
            $table->decimal('temperatura', 4, 2); // Ej: 23.50 grados
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_uso_aire_acondicionado');
    }
};