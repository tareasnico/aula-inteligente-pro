<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   // database/migrations/xxxx_xx_xx_xxxxxx_create_aulas_table.php
// database/migrations/xxxx_xx_xx_xxxxxx_create_aulas_table.php
public function up(): void
{
    Schema::create('aulas', function (Blueprint $table) {
        $table->id();
        $table->string('nombre')->unique();
        $table->string('ubicacion');
        $table->integer('capacidad');
        $table->string('estado')->default('disponible'); // Ej: disponible, ocupada, mantenimiento
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aulas');
    }
};
