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
    Schema::table('aire_acondicionado', function (Blueprint $table) {
        $table->foreignId('aula_id')->nullable()->after('id')->constrained('aulas')->onDelete('set null');
    });
}

public function down(): void
{
    Schema::table('aire_acondicionado', function (Blueprint $table) {
        $table->dropForeign(['aula_id']);
        $table->dropColumn('aula_id');
    });
}
};
