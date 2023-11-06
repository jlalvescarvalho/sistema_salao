<?php

namespace App\Http\Controllers;

use App\DataTables\ClienteDataTable;
use App\Http\Requests\CreateClienteRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;
use App\DataTables\ServicosDataTable;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ClienteDataTable $dataTable)
    {
        return $dataTable->render('clientes.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateClienteRequest $request)
    {
        $dados = $request->all();
        $cliente = Cliente::create([
            'nome' => $dados['nome'],
            'telefone' => $dados['telefone'],
            'cpf' => $dados['cpf'],
            'data_nascimento' => $dados['data_nascimento'],
        ]);

        if (isset($dados['endereco'])) {
            $cliente->endereco()->create([
                'rua' => $dados['endereco']['rua'],
                'numero' => $dados['endereco']['numero'],
                'bairro' => $dados['endereco']['bairro'],
                'cidade' => $dados['endereco']['cidade'],
                'estado' => $dados['endereco']['estado'],
                'cep' => $dados['endereco']['cep'],
            ]);
        }

        return redirect()->route('clientes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
