<?php

namespace App\Http\Controllers;

use App\Enums\StatusAgendamento;
use App\Http\Requests\CreateAgendamentoRequest;
use App\Http\Requests\UpdateAgendamentoRequest;
use App\Models\Agendamento;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class AgendamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function buscar(Request $request)
    {
        try {
            $filtros = $request->validate([
                'status' => ['nullable', Rule::enum(StatusAgendamento::class)],
                'ano' => 'nullable|date_format:Y',
                'mes' => 'nullable|date_format:m',
                'cliente_id' => 'nullable|integer',
            ]);

            if (empty($filtros) || empty(array_filter($filtros, fn ($v) => isset($v)))) {
                return response()->json(['message' => 'Informe algum filtro!'], 400);
            }

            $query = Agendamento::query()
                ->select([
                    'id',
                    'id_cliente',
                    'id_servico',
                    'data_hora',
                    'data_hora_chegada',
                    'data_hora_finalizacao',
                    'duracao',
                    'observacao',
                    'status',
                ])
                ->with([
                    'cliente:id,nome',
                    'servico:id,nome',
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

            if (!empty($filtros['cliente_id'])) {
                $query->where('cliente_id', $filtros['cliente_id']);
            }

            $agendamentos = $query->orderBy('data_hora')->get();

            return response()->json(compact('agendamentos'));
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->validator->errors()], 422);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateAgendamentoRequest $request)
    {
        Agendamento::create($request->validated());
        return response()->json(['message' => 'Agendamento cadastrado com sucesso!'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Agendamento $agendamento)
    {
        return response()->json(compact('agendamento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAgendamentoRequest $request, Agendamento $agendamento)
    {
        if ($agendamento->status == 'Concluido') {
            return response()->json(['message' => 'Agendamento já concluído!'], 400);
        }

        $agendamento->update($request->validated());
        return response()->json(['message' => 'Agendamento atualizado com sucesso!'], 200);
    }

    public function concluir(Request $request, Agendamento $agendamento)
    {
        if ($agendamento->status == 'Concluido') {
            return response()->json(['message' => 'Agendamento já concluído!'], 400);
        }

        $dados = $request->validate([
            'data_hora_chegada' => 'nullable|datetime:Y-m-d H:i:s',
            'data_hora_finalizacao' => 'nullable|date:Y-m-d H:i:s',
            'observacao' => 'sometimes|string|max:255',
        ]);

        if (empty($dados['data_hora_finalizacao'])) {
            $dados['data_hora_finalizacao'] = now();
        }

        $agendamento->update($dados);
        return response()->json(['message' => 'Agendamento concluído com sucesso!'], 200);
    }
}
