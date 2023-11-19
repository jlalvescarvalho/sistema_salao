<?php

namespace App\Http\Requests;

use App\Enums\StatusAgendamento;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAgendamentoRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'data_hora' => 'nullable|date',
            'observacao' => 'nullable|string|max:255',
            'status' => [Rule::enum(StatusAgendamento::class), Rule::notIn([StatusAgendamento::Concluido])],
        ];
    }
}
