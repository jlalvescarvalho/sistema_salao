<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Cliente;
use App\Models\ContratoPacote;
use App\Models\Servico;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;
use Nette\Utils\Arrays;
use PhpParser\Node\Expr\Cast\Array_;

enum status
{
    case pendente;
    case concluido;
    case cancelado;
    case faltou;
}
class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $events  = array();
        $clientes = Cliente::all();
        $nContratos = ContratoPacote::where('status', '=', 'ativo')->count();
        $nAgendamentosPendentes = Agendamento::where('status', '=', 'pendente')->count();
        $nAgendamentosConcluidos = Agendamento::where('status', '=', 'concluido')->count();
        $agendamentos = $this->buscar();
        $servicos = Servico::All();

        foreach ($agendamentos as $agenda) {
            $events[] = [
                'title' => $agenda->servico->nome,
                'start' => $agenda->data_hora,
                'data' => $agenda->agendamento,
            ];
        }

        return view('home', [
            'clientes' => $clientes,
            'nAgendamentosPendentes' => $nAgendamentosPendentes,
            'nAgendamentosConcluidos' => $nAgendamentosConcluidos,
            'nContratos' => $nContratos,
            'agendamentos' => $events,
            'servicos' => $servicos,
        ]);
    }

    public function buscar()
    {

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
            ])->where('status', '=', 'pendente');

        $agendamentos = $query->orderBy('data_hora')->get();

        return $agendamentos;
    }
}
