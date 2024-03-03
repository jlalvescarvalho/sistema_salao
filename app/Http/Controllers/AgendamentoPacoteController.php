<?php

namespace App\Http\Controllers;

use App\DataTables\AgendamentoPacoteDataTable;
use App\Enums\StatusAgendamento;
use App\Enums\StatusContratoPacote;
use App\Http\Requests\CreateAgendamentoPacoteRequest;
use App\Http\Requests\UpdateAgendamentoPacoteRequest;
use App\Http\Resources\BuscaAgendamentoPacoteResource;
use App\Models\AgendamentoPacote;
use App\Models\ContratoPacote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class AgendamentoPacoteController extends Controller
{
    public function index(AgendamentoPacoteDataTable $dataTable)
    {
        return $dataTable->render('agendamentos-pacotes.index');
    }

    public function create()
    {
        $contratos = ContratoPacote::select([
            'contratos_pacotes.id',
            'id_pacote',
            'id_cliente'
        ])
            ->where('status', StatusContratoPacote::Ativo->value)
            ->with([
                'cliente:id,nome',
                'pacote:id,nome',
            ])
            ->get()
            ->map(fn ($v) => ['id' => $v->id, 'label' => "{$v->cliente->nome} - {$v->pacote->nome}"]);

        return view('agendamentos-pacotes.form', [
            'pageTitle' => 'Cadastrar Agendamento',
            'contratos' => $contratos,
            'statusList' => [StatusAgendamento::Pendente->value],
            'agendamento' => new AgendamentoPacote(),
        ]);
    }

    public function edit(AgendamentoPacote $agendamento)
    {
        $agendamento->load([
            'contrato:id,id_cliente,id_pacote',
        ]);
        $agendamento->contrato->load([
            'cliente:id,nome',
            'pacote:id,nome',
        ]);

        $statusList = [StatusAgendamento::Concluido->value];
        if ($agendamento->status != StatusAgendamento::Concluido->value) {
            $statusList = array_filter(
                StatusAgendamento::getOptions(),
                fn ($v) => $v != StatusAgendamento::Concluido->value
            );
        }

        return view('agendamentos.form', [
            'pageTitle' => 'Editar Agendamento de Pacote',
            'statusList' => $statusList,
            'agendamento' => $agendamento,
        ]);
    }

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
                        'cliente:id,nome,telefone',
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

    public function store(CreateAgendamentoPacoteRequest $request)
    {
        $contrato = ContratoPacote::find($request->id_contrato_pacote);

        if ($contrato->status != StatusContratoPacote::Ativo->value) {
            return response()->json(['message' => 'Este contrato está ' . $contrato->status], 422);
        }

        if (now()->isAfter($contrato->data_vencimento)) {
            $contrato->update(['status' => StatusContratoPacote::Vencido]);
            return response()->json(['message' => 'Este contrato está vencido!'], 422);
        }

        if ($contrato->qtd_sessoes_restantes <= 0) {
            return response()->json(['message' => 'Não há mais sessões disponíveis para este pacote!'], 422);
        }

        AgendamentoPacote::create($request->validated());
        return response()->json(['message' => 'Agendamento cadastrado com sucesso!'], 201);
    }

    public function update(UpdateAgendamentoPacoteRequest $request, AgendamentoPacote $agendamento)
    {
        if ($agendamento->status == 'Concluido') {
            return response()->json(['message' => 'Agendamento já concluído!'], 422);
        }

        $agendamento->update($request->validated());
        return response()->json(['message' => 'Agendamento atualizado com sucesso!'], 200);
    }

    public function concluir(Request $request, int $id)
    {
        $agendamento = AgendamentoPacote::findOrFail($id);
        if ($agendamento->status == StatusAgendamento::Concluido->value) {
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

        DB::beginTransaction();
        $dados['status'] = StatusAgendamento::Concluido->value;
        $agendamento->update($dados);
        $agendamento->contrato->decrement('qtd_sessoes_restantes');
        DB::commit();
        return response()->json(['message' => 'Agendamento concluído com sucesso!'], 200);
    }
}
