<?php

namespace App\Http\Controllers;

use App\Enums\StatusAgendamento;
use App\Models\Agendamento;
use App\Models\AgendamentoPacote;
use App\Models\Cliente;
use App\Models\ContratoPacote;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalClientes = Cliente::count();
        $totalContratosAtivos = ContratoPacote::where('status', '=', 'ativo')->count();

        $totalAgendamentosPendentes = Agendamento::where('status', '=', StatusAgendamento::Pendente)->count();
        $totalAgendamentosPendentes += AgendamentoPacote::where('status', '=', StatusAgendamento::Pendente)->count();

        $totalAgendamentosConcluidos = Agendamento::where('status', '=', StatusAgendamento::Concluido)->count();
        $totalAgendamentosConcluidos += AgendamentoPacote::where('status', '=', StatusAgendamento::Concluido)->count();

        return view('home', compact(
            'totalClientes',
            'totalAgendamentosPendentes',
            'totalAgendamentosConcluidos',
            'totalContratosAtivos',
        ));
    }
}
