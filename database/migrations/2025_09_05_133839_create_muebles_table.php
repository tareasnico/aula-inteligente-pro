<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
// database/migrations/xxxx_xx_xx_xxxxxx_create_muebles_table.php
public function up(): void
{
    Schema::create('muebles', function (Blueprint $table) {
        $table->id();
        $table->string('nro_inventario')->unique();
        $table->string('nombre'); // Ej: Silla, Mesa, Proyector
        $table->string('estado'); // Ej: funcional, dañado, en_mantenimiento
        $table->boolean('es_proyector')->default(false);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('muebles');
    }
};
