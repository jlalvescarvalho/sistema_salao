<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAgendamentoPacoteRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id_contrato_pacote' => 'required|exists:contratos_pacotes,id',
            'data_hora' => 'required|date',
            'data_minima_cancelamento' => 'nullable|date',
            'duracao' => 'nullable|date_format:H:i:s|min:00:00:00',
            'observacao' => 'nullable|string|max:255',
        ];
    }
}
