<?php

namespace App\Http\Controllers;

use App\Models\ContratoPacote;
use App\Models\Pacote;
use Illuminate\Http\Request;

class ContratoPacoteController extends Controller
{
    public function index()
    {
        return view('contratos.index');
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'pacote_id' => 'required|integer|exists:pacotes,id',
            'cliente_id' => 'required|integer|exists:clientes,id',
        ]);

        $pacote = Pacote::select('qtd_sessoes', 'validade')->find($dados['pacote_id']);

        $dados['data_contrato'] = now()->format('Y-m-d');
        $dados['data_vencimento'] = now()->addDay($pacote->validade)->format('Y-m-d');
        $dados['qtd_sessoes'] = $pacote->qtd_sessoes;
        $dados['status'] = 'ativo';

        ContratoPacote::create($dados);

        return redirect()->route('pacotes.index');
    }

    public function cancelar(ContratoPacote $pacote)
    {
        $pacote->update(['status' => 'cancelado']);
        return redirect()->route('pacotes.index');
    }
}
