<?php

namespace App\Http\Controllers;

use App\DataTables\PacotesDataTable;
use App\Http\Requests\CreateUpdatePacoteRequest;
use App\Models\Pacote;
use App\Models\Servico;

class PacoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PacotesDataTable $dataTable)
    {
        return $dataTable->render('pacotes.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pacotes.form', [
            'pageTitle' => 'Cadastrar Pacote',
            'servicos' => Servico::select('id', 'nome')->get(),
            'pacote' => new Pacote(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUpdatePacoteRequest $request)
    {
        Pacote::create($request->validated());
        return redirect()->route('pacotes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pacote $pacote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pacote $pacote)
    {
        return view('pacotes.form', [
            'pageTitle' => 'Editar Pacote',
            'servicos' => Servico::select('id', 'nome')->get(),
            'pacote' => $pacote,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateUpdatePacoteRequest $request, Pacote $pacote)
    {
        $pacote->update($request->validated());
        return redirect()->route('pacotes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pacote $pacote)
    {
        if ($pacote->contratos()->count() > 0) {
            return redirect()->route('pacotes.index')->withErrors(['alerta-usuario' => 'Não é possível excluir um pacote que possui contratos vinculados.']);
        }

        $pacote->delete();
        return redirect()->route('pacotes.index');
    }
}
