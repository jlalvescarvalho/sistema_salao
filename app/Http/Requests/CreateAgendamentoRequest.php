<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAgendamentoRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id_cliente' => 'required|exists:clientes,id',
            'id_servico' => 'required|exists:servicos,id',
            'data_hora' => 'required|date',
            'duracao' => 'nullable|date_format:H:i',
            'observacao' => 'nullable|string|max:255',
        ];
    }
}
