<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('focos', function (Blueprint $table) {
            // Añadimos la columna 'estado' (0=apagado, 1=prendido)
            // Se coloca después de 'intensidad' para mantener el orden
            $table->boolean('estado')->default(false)->after('intensidad');
        });
    }

    public function down(): void
    {
        Schema::table('focos', function (Blueprint $table) {
            $table->dropColumn('estado');
        });
    }
};