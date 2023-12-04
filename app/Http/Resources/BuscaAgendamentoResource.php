<?php

namespace App\Http\Resources;

use Carbon\CarbonInterval;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BuscaAgendamentoResource extends JsonResource
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
            'cliente' => [
                'id' => $this->cliente->id,
                'nome' => $this->cliente->nome,
                'telefone' => $this->cliente->telefone,
            ],
            'servico' => [
                'id' => $this->servico->id,
                'nome' => $this->servico->nome,
            ],
            'data_hora' => $this->data_hora,
            'data_hora_chegada' => $this->data_hora_chegada,
            'data_hora_finalizacao' => $this->data_hora_finalizacao,
            'duracao' => CarbonInterval::createFromFormat("h:i:s", $this->duracao)->forHumans(),
            'observacao' => $this->observacao,
            'status' => $this->status,
        ];
    }
}
