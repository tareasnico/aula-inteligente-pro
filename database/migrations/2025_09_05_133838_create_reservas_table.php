<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
// database/migrations/xxxx_xx_xx_xxxxxx_create_reservas_table.php
public function up(): void
{
    Schema::create('reservas', function (Blueprint $table) {
        $table->id();
        $table->date('fecha');
        $table->string('tipo_origen'); // Ej: automatica_horario, manual_docente

        $table->foreignId('aula_id')->constrained('aulas')->onDelete('cascade');
        $table->foreignId('materia_id')->constrained('materias')->onDelete('cascade');
        $table->foreignId('horario_id')->constrained('horarios')->onDelete('cascade');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
