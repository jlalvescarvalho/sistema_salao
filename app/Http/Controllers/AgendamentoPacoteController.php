<?php

namespace App\Http\Controllers;

use App\Http\Resources\BuscaAgendamentoPacoteResource;
use App\Models\AgendamentoPacote;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class AgendamentoPacoteController extends Controller
{
    public function buscar(Request $request)
    {
        try {
            $filtros = $request->validate([
                'status' => ['nullable', Rule::enum(StatusAgendamento::class)],
                'ano' => 'nullable|date_format:Y',
                'mes' => 'nullable|date_format:m',
            ]);

            if (empty($filtros) || empty(array_filter($filtros, fn ($v) => isset($v)))) {
                return response()->json(['message' => 'Informe algum filtro!'], 400);
            }

            $query = AgendamentoPacote::query()
                ->select([
                    'id',
                    'id_contrato_pacote',
                    'data_hora',
                    'data_minima_cancelamento',
                    'data_hora_chegada',
                    'data_hora_finalizacao',
                    'duracao',
                    'observacao',
                    'status',
                ])
                ->with([
                    'contrato:id,id_cliente,id_pacote,qtd_sessoes_restantes' => [
                        'cliente:id,nome',
                        'pacote:id,nome',
                    ],
                ]);

            if (!empty($filtros['status'])) {
                $query->where('status', $filtros['status']);
            }

            if (!empty($filtros['ano'])) {
                $query->whereYear('data_hora', $filtros['ano']);
            }

            if (!empty($filtros['mes'])) {
                $query->whereMonth('data_hora', $filtros['mes']);
            }

            $agendamentos = $query->orderBy('data_hora')->get();

            return BuscaAgendamentoPacoteResource::collection($agendamentos);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->validator->errors()], 422);
        }
    }
}
