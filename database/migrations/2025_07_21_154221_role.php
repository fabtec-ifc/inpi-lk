<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->unique(); // ex: 'reitoria', 'campus', 'normal'
            $table->timestamps();
        });

        // Inserir papéis padrão
        DB::table('roles')->insert([
            ['nome' => 'reitoria'],
            ['nome' => 'campus'],
            ['nome' => 'normal'],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
