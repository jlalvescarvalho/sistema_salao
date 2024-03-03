<?php

namespace App\Http\Controllers;

use App\DataTables\ContratosDataTable;
use App\Models\Cliente;
use App\Models\ContratoPacote;
use App\Models\Pacote;
use Illuminate\Http\Request;

class ContratoPacoteController extends Controller
{
    public function index(ContratosDataTable $contratosDataTable)
    {
        return $contratosDataTable->render('contratos.index');
    }

    public function create()
    {
        return view('contratos.form', [
            'pageTitle' => 'Cadastrar Contrato',
            'clientes' => Cliente::select('id', 'nome')->orderBy('nome')->get(),
            'pacotes' => Pacote::select('id', 'nome')->orderBy('nome')->get(),
            'contrato' => new ContratoPacote(),
        ]);
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'id_pacote' => 'required|integer|exists:pacotes,id',
            'id_cliente' => 'required|integer|exists:clientes,id',
        ]);

        $pacote = Pacote::select('qtd_sessoes', 'validade')->find($dados['id_pacote']);

        $dados['data_contrato'] = now()->format('Y-m-d');
        $dados['data_vencimento'] = now()->addDay($pacote->validade)->format('Y-m-d');
        $dados['qtd_sessoes'] = $pacote->qtd_sessoes;
        $dados['qtd_sessoes_restantes'] = $pacote->qtd_sessoes;
        $dados['status'] = 'ativo';

        ContratoPacote::create($dados);

        return redirect()->route('contratos.index');
    }

    public function cancelar(ContratoPacote $pacote)
    {
        $pacote->update(['status' => 'cancelado']);
        return redirect()->route('contratos.index');
    }

    public function destroy(ContratoPacote $pacote)
    {
        $pacote->delete();
        return redirect()->route('contratos.index');
    }
}
