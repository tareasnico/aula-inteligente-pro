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
        Schema::create('cortinas', function (Blueprint $table) {
            $table->id();
            $table->string('ubicacion'); // Ej: "Ventanal Izquierdo"
            $table->string('estado'); // Ej: "extendida", "media_altura", "guardada"

            // Relación: Una cortina pertenece a un aula
            $table->foreignId('aula_id')->constrained('aulas')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cortinas');
    }
};