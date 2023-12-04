<?php

namespace App\Http\Controllers;

use App\DataTables\ServicosDataTable;
use App\Http\Requests\CreateUpdateServicoRequest;
use App\Models\Servico;

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
            'pageTitle' => 'Cadastro de Serviços',
            'servico' => new Servico(),
        ]);
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
            'pageTitle' => 'Editar Serviço',
            'servico' => $servico,
        ]);
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
        if ($servico->agendamentos()->count() > 0) {
            return redirect()->route('servicos.index')->withErrors([
                'alerta-usuario' => 'Não é possível excluir um serviço que possui agendamentos.',
            ]);
        }

        if ($servico->pacotes()->count() > 0) {
            return redirect()->route('servicos.index')->withErrors([
                'alerta-usuario' => 'Não é possível excluir um serviço que possui pacotes.',
            ]);
        }

        $servico->delete();
        return redirect()->route('servicos.index');
    }
}
