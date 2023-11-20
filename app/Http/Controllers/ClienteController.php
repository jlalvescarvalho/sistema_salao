<?php

namespace App\Http\Controllers;

use App\DataTables\ClienteDataTable;
use App\Http\Requests\CreateUpdateClienteRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;
use App\DataTables\ServicosDataTable;
use App\Models\Endereco;

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
        return view('clientes.form', [
            'pageTitle' => 'Cadastrar Cliente',
            'cliente' => new Cliente(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUpdateClienteRequest $request)
    {
        $dados = $request->validated();
        if (isset($dados['endereco'])) {
            $endereco = Endereco::create([
                'rua' => $dados['endereco']['rua'],
                'numero' => $dados['endereco']['numero'],
                'bairro' => $dados['endereco']['bairro'],
                'cidade' => $dados['endereco']['cidade'],
                'estado' => $dados['endereco']['estado'],
                'cep' => $dados['endereco']['cep'],
            ]);
            Cliente::create([
                'nome' => $dados['nome'],
                'telefone' => $dados['telefone'],
                'cpf' => $dados['cpf'],
                'data_nascimento' => $dados['data_nascimento'],
                'id_endereco' => $endereco->id,
            ]);
        } else {
            Cliente::create([
                'nome' => $dados['nome'],
                'telefone' => $dados['telefone'],
                'cpf' => $dados['cpf'],
                'data_nascimento' => $dados['data_nascimento'],
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
        $cliente->load('endereco');
        return view('clientes.form', [
            'pageTitle' => 'Editar Cliente',
            'cliente' => $cliente,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateUpdateClienteRequest $request, Cliente $cliente)
    {
        $dados = $request->validated();
        $cliente->update([
            'nome' => $dados['nome'],
            'telefone' => $dados['telefone'],
            'cpf' => $dados['cpf'],
            'data_nascimento' => $dados['data_nascimento'],
        ]);

        if (array_key_exists('endereco', $dados)) {
            $cliente->endereco()->update($dados['endereco']);
        }

        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index');
    }
}
