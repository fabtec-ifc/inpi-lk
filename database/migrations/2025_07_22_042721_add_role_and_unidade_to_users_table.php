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
        Schema::table('users', function (Blueprint $table) {
            // Substitui a string 'role' por FK para tabela roles
            $table->foreignId('role_id')
                ->nullable()
                ->constrained('roles')
                ->onDelete('set null');

            // Relacionamento com unidade
            $table->foreignId('unidade_id')
                ->nullable()
                ->constrained('unidades')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropConstrainedForeignId('role_id');
            $table->dropConstrainedForeignId('unidade_id');
        });
    }
};
