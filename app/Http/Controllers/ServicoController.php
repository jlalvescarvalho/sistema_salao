<?php

namespace App\Http\Controllers;

use App\DataTables\ServicosDataTable;
use App\Http\Requests\CreateUpdateServicoRequest;
use App\Models\Servico;
use Exception;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ServicosDataTable $dataTable)
    {
        return $dataTable->render('servicos.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('servicos.form', [
            'pageTitle' => 'Cadastro de Serviços'
        ])->withServico(new Servico());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUpdateServicoRequest $request)
    {
        Servico::create($request->validated());
        return redirect()->route('servicos.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Servico $servico)
    {
        return view('servicos.form', [
            'pageTitle' => 'Editar Serviço'
        ])->withServico($servico);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateUpdateServicoRequest $request, Servico $servico)
    {
        $servico->update($request->validated());
        return redirect()->route('servicos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Servico $servico)
    {
        $servico->delete();
        return redirect()->route('servicos.index');
    }
}
