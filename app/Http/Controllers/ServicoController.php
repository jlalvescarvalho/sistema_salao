<?php

namespace App\Http\Controllers;

use App\DataTables\ServicosDataTable;
use App\Http\Requests\CreateServicoRequest;
use App\Models\Servico;
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
        return view('servicos.create', [
            'servicos' => Servico::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateServicoRequest $request)
    {
        $dados = $request->validated();
        Servico::create($dados);
        return redirect()->route('servicos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('servicos.show', array('servico' => Servico::find($id)));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //code
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Servico $servico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Servico $servico)
    {
        //
    }
}
