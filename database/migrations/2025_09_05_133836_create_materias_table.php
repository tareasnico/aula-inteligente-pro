<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   // database/migrations/xxxx_xx_xx_xxxxxx_create_materias_table.php
public function up(): void
{
    Schema::create('materias', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->string('carrera');
        $table->string('año');
        $table->string('tipo_cursada'); // Ej: cuatrimestral, anual
        
        $table->foreignId('docente_id')->constrained('docentes')->onDelete('cascade');
        $table->foreignId('aula_recomendada_id')->nullable()->constrained('aulas')->onDelete('set null');

        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materias');
    }
};
