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
        Schema::create('focos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->string('ubicacion'); // Ej: "Fila 1, Cerca de la ventana"
            $table->string('tipo')->default('LED'); // Ej: "LED", "Fluorescente"
            $table->unsignedTinyInteger('intensidad')->default(100); // Un valor de 0 a 100
            
            // Relación: Un foco pertenece a un aula
            $table->foreignId('aula_id')->constrained('aulas')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('focos');
    }
};