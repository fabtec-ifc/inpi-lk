<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'numero_pedido',        // número do pedido / processo
        'rl',
        'dataDeposito',
        'proximaAnuidade',
        'ultimaVerificacao',
        'unidade_id',
        'tipoRegistro_id',
        'ipc',
        'publicacao',
        'resumo',
        'status',
        'ativo',
    ];

    // Relação com Unidade
    public function unidade()
    {
        return $this->belongsTo(Unidade::class);
    }

    // Relação com TipoRegistro (1 = Patente, 2 = Marca)
    public function tipoRegistro()
    {
        return $this->belongsTo(TipoRegistro::class, 'tipoRegistro_id');
    }

    // Decide se é local (tem dados preenchidos) ou remoto (buscar na API)
    public function isLocal()
    {
        return !empty($this->titulo) || !empty($this->resumo);
    }

    // Gera URL para abrir (seja local ou API)
    public function getViewUrl()
    {
        if ($this->isLocal()) {
            return route('registros.show', $this->id);
        }
        return route('api.registros.show', $this->numero_pedido);
    }
}
