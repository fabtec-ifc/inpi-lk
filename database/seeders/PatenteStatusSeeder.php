<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PatenteStatus;

class PatenteStatusSeeder extends Seeder
{
    public function run(): void
    {
        $statusList = [
            ['nome' => 'Depósito recebido', 'descricao' => 'Pedido protocolado no INPI'],
            ['nome' => 'Publicação do pedido', 'descricao' => 'Pedido publicado na RPI'],
            ['nome' => 'Exame formal em análise', 'descricao' => 'Verificação da documentação inicial'],
            ['nome' => 'Exigência formal emitida', 'descricao' => 'Correções solicitadas pelo INPI'],
            ['nome' => 'Aguardando exame técnico', 'descricao' => 'Pedido na fila de análise de mérito'],
            ['nome' => 'Pedido de exame técnico protocolado', 'descricao' => 'Exame técnico solicitado'],
            ['nome' => 'Exame técnico em andamento', 'descricao' => 'Análise de novidade e atividade inventiva'],
            ['nome' => 'Exigência técnica emitida', 'descricao' => 'Esclarecimentos solicitados'],
            ['nome' => 'Manifestação do depositante', 'descricao' => 'Resposta às exigências apresentada'],
            ['nome' => 'Deferido', 'descricao' => 'Patente concedida'],
            ['nome' => 'Indeferido', 'descricao' => 'Pedido negado'],
            ['nome' => 'Arquivado por falta de pedido de exame', 'descricao' => 'Não solicitado dentro do prazo legal'],
            ['nome' => 'Arquivado por não resposta a exigência', 'descricao' => 'Sem manifestação do titular'],
            ['nome' => 'Arquivado por falta de pagamento', 'descricao' => 'Não pagamento de taxas ou anuidades'],
            ['nome' => 'Retirado', 'descricao' => 'Pedido retirado pelo depositante'],
            ['nome' => 'Caducado', 'descricao' => 'Perdeu validade por falta de pagamento de anuidade'],
            ['nome' => 'Anulado', 'descricao' => 'Patente anulada administrativamente/judicialmente'],
            ['nome' => 'Extinto', 'descricao' => 'Fim do prazo de proteção'],
            ['nome' => 'Em recurso', 'descricao' => 'Pedido contestado pelo depositante'],
            ['nome' => 'Em nulidade', 'descricao' => 'Patente em processo de nulidade'],
        ];

        foreach ($statusList as $status) {
            PatenteStatus::create($status);
        }
    }
}
