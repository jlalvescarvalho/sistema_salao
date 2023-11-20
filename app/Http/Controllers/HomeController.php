<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Cliente;
use App\Models\ContratoPacote;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;

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
        $nClientes = Cliente::count();
        $nContratos = ContratoPacote::where('status', '=', 'ativo')->count();

        // Contagem de agendamentos pendentes
        $nAgendamentosPendentes = Agendamento::where('status', '=', 'pendente')->count();

        // Contagem de agendamentos concluídos
        $nAgendamentosConcluidos = Agendamento::where('status', '=', 'concluido')->count();

        return view('home', [
            'nClientes' => $nClientes,
            'nAgendamentosPendentes' => $nAgendamentosPendentes,
            'nAgendamentosConcluidos' => $nAgendamentosConcluidos,
            'nContratos' => $nContratos
        ]);
    }
}
//clientes, contratos ativos, agendamentos marcados e agendamentos concluídos
