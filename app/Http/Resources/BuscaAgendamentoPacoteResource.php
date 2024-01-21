<?php

namespace App\Http\Resources;

use Carbon\CarbonInterval;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BuscaAgendamentoPacoteResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'contrato' => [
                'id' => $this->contrato->id,
                'qtd_sessoes_restantes' => $this->contrato->qtd_sessoes_restantes,
            ],
            'cliente' => [
                'id' => $this->contrato->cliente->id,
                'nome' => $this->contrato->cliente->nome,
                'telefone' => $this->contrato->cliente->telefone,
            ],
            'pacote' => [
                'id' => $this->contrato->pacote->id,
                'nome' => $this->contrato->pacote->nome,
            ],
            'data_hora' => $this->data_hora,
            'data_minima_cancelamento' => $this->data_minima_cancelamento,
            'data_hora_chegada' => $this->data_hora_chegada,
            'data_hora_finalizacao' => $this->data_hora_finalizacao,
            'duracao' => $this->duracao ? CarbonInterval::createFromFormat("h:i:s", $this->duracao)->forHumans() : null,
            'observacao' => $this->observacao,
            'status' => $this->status,
        ];
    }
}
