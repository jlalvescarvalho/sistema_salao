<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUpdatePacoteRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id_servico' => 'required|integer|exists:servicos,id',
            'nome' => 'required|string|min:3|max:50',
            'descricao' => 'nullable|string|min:3|max:255',
            'valor' => 'required|numeric|min:0|max:999999.99',
            'qtd_sessoes' => 'required|integer|min:1|max:255',
            'validade' => 'required|integer|min:1|max:255',
        ];
    }
}
