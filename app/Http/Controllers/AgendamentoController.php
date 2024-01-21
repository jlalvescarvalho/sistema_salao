<?php

namespace App\Http\Controllers;

use App\DataTables\AgendamentoDataTable;
use App\Enums\StatusAgendamento;
use App\Http\Requests\CreateAgendamentoRequest;
use App\Http\Requests\UpdateAgendamentoRequest;
use App\Http\Resources\BuscaAgendamentoResource;
use App\Models\Agendamento;
use App\Models\Cliente;
use App\Models\Servico;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class AgendamentoController extends Controller
{
    public function index(AgendamentoDataTable $dataTable)
    {
        return $dataTable->render('agendamentos.index');
    }

    public function create()
    {
        return view('agendamentos.form', [
            'pageTitle' => 'Cadastrar Agendamento',
            'servicos' => Servico::select('id', 'nome')->get(),
            'clientes' => Cliente::select('id', 'nome')->orderBy('nome')->get(),
            'agendamento' => new Agendamento(),
        ]);
    }

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
                    'cliente:id,nome,telefone',
                    'servico:id,nome',
                ]);

            if (!empty($filtros['status'])) {
                $query->where('status', 'pendente');
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

            return BuscaAgendamentoResource::collection($agendamentos);
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
        return redirect()->route('agendamentos.index');
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
        if ($agendamento->status == StatusAgendamento::Concluido) {
            return response()->json(['message' => 'Agendamento já concluído!'], 400);
        }

        $agendamento->update($request->validated());
        return response()->json(['message' => 'Agendamento atualizado com sucesso!'], 200);
    }

    public function concluir(Request $request, Agendamento $agendamento)
    {
        if ($agendamento->status == StatusAgendamento::Concluido) {
            return response()->json(['message' => 'Agendamento já concluído!'], 422);
        }

        $dados = $request->validate([
            'data_hora_chegada' => 'nullable|datetime:Y-m-d H:i:s',
            'data_hora_finalizacao' => 'nullable|date:Y-m-d H:i:s',
            'observacao' => 'sometimes|string|max:255',
        ]);

        if (empty($dados['data_hora_finalizacao'])) {
            $dados['data_hora_finalizacao'] = now();
        }

        $dados['status'] = StatusAgendamento::Concluido;
        $agendamento->update($dados);
        return response()->json(['message' => 'Agendamento concluído com sucesso!'], 200);
    }
}
