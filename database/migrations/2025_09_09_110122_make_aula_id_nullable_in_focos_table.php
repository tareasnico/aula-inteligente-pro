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
    Schema::table('focos', function (Blueprint $table) {
        // Hacemos que la columna aula_id acepte valores nulos
        $table->foreignId('aula_id')->nullable()->change();
    });
}

public function down(): void
{
    Schema::table('focos', function (Blueprint $table) {
        // Esto permite revertir la migración si es necesario
        $table->foreignId('aula_id')->nullable(false)->change();
    });
}
};
