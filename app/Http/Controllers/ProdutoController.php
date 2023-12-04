<?php

namespace App\Http\Controllers;

use App\DataTables\ProdutosDataTable;
use App\Http\Requests\CreateUpdateProdutoRequest;
use app\Http\Services\ProdutoService;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProdutosDataTable $dataTable)
    {
        return $dataTable->render('produtos.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produtos.form', [
            'pageTitle' => 'Cadastrar Produto',
            'produto' => new Produto(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUpdateProdutoRequest $request)
    {
        Produto::create($request->validated());
        return redirect()->route('produtos.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        return view('produtos.form', [
            'pageTitle' => 'Editar Produto',
            'produto' => $produto,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateUpdateProdutoRequest $request, Produto $produto)
    {
        $produto->update($request->validated());
        return redirect()->route('produtos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produtos.index');
    }
}
