<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePacoteRequest;
use App\Models\Pacote;
use App\Models\Servico;
use Illuminate\Http\Request;

class PacoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pacotes.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pacotes.create', [
            'servicos' => Servico::select('id', 'nome')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePacoteRequest $request)
    {
        Pacote::create($request->validated());
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pacote $pacote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pacote $pacote)
    {
        //
    }
}
