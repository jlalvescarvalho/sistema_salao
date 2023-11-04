<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateServicoRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|min:3|max:50',
            'descricao' => 'required|min:3|max:255',
            'preco_custo' => 'nullable|numeric|min:0|max:999999.99',
            'preco_venda' => 'required|numeric|min:0|max:999999.99',
        ];
    }
}
