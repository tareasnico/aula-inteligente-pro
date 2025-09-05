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
        Schema::create('historial_focos', function (Blueprint $table) {
            $table->id();
            
            // Relación: El registro pertenece a un foco específico
            $table->foreignId('foco_id')->constrained('focos')->onDelete('cascade');
            
            $table->date('fecha');
            $table->time('hora_inicio');
            $table->time('hora_fin')->nullable(); // Puede ser nulo si el estado aún está activo
            $table->string('estado'); // Ej: "encendido", "apagado"
            $table->unsignedTinyInteger('intensidad_usada'); // La intensidad a la que estuvo
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_focos');
    }
};