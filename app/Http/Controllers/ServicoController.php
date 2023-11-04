<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateServicoRequest;
use App\Models\Servico;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('servico.index', [
            'servicos' => Servico::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('servico.create');
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
    public function show(Servico $servico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Servico $servico)
    {
        //
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
