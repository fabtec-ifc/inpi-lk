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
        Schema::create('registros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('numero_pedido');
            $table->string('rl')->nullable();
            $table->date('dataDeposito')->nullable();
            $table->date('proximaAnuidade')->nullable();
            $table->date('ultimaVerificacao')->nullable();
            $table->string('ipc')->nullable();
            $table->date('publicacao')->nullable();
            $table->text('resumo')->nullable();
            $table->string('status')->default('Em análise');
            $table->foreignId('unidade_id')->nullable()->constrained('unidades')->onDelete('set null');
            $table->foreignId('tipoRegistro_id')->constrained('tipo_registros')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registros');
    }
};
?>
