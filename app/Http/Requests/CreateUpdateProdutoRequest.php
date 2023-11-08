<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUpdateProdutoRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'codbarra' => 'required|string|max:255|unique:produtos,codbarra,' . $this->route('produto')?->id,
            'descricao' => 'required|string|max:255',
            'un' => 'required|string|max:255',
            'preco_custo' => 'required|numeric|min:0',
            'preco_venda' => 'required|numeric|min:0',
            'estoqueinicial' => 'required|numeric|min:0',
        ];
    }
}
