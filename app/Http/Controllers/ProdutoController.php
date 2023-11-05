<?php

namespace App\Http\Controllers;

use app\Http\Services\ProdutoService;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empresa = Auth::user();
        $ProdutoService = new ProdutoService();
        $produtos = $ProdutoService->TodosProdutos($empresa->id_empresa);
        return view('produto.index', ['produtos' => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produto.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show($id, $empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, $empresa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, $empresa)
    {
        //
    }
}
