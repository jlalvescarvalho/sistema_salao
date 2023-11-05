<?php

namespace app\Http\Services;

use App\Models\Produto;
use Exception;

class ProdutoService
{

    public function inserir(Produto $produto)
    {
        try {
            return Produto::create([
                'codbarras' => $produto->codbarras,
                'descricao' => $produto->descricao,
                'un'        => $produto->un,
                'precocusto' => $produto->precocusto,
                'precovenda' => $produto->precovenda,
                'estoqueinicial' => $produto->estoqueinicial,
                'id_empresa' => $produto->id_empresa
            ]);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function getProduto($id, $empresa)
    {
        try {
            $produto = Produto::where('id_empresa', '=', $empresa)->where('id', '=', $id)->get();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        };

        return $produto;
    }

    public function TodosProdutos($empresa)
    {
        try {
            return Produto::where('id_empresa', '=', $empresa)->get();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        };
    }

    public function deletarProduto($id)
    {
        try {
            Produto::destroy($id);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        };
    }

    public function atualizarProduto($produto)
    {
        try {
            $produto = Produto::find($produto->id);
            return $produto->update([
                'codbarras' => $produto->codbarras,
                'descricao' => $produto->descricao,
                'un'        => $produto->un,
                'precocusto' => $produto->precocusto,
                'precovenda' => $produto->precovenda,
                'estoqueinicial' => $produto->estoqueinicial
            ]);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
