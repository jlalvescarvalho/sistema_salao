<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUpdateClienteRequest extends FormRequest
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
            'telefone' => 'required|string|size:11',
            'cpf' => 'required|size:11|unique:clientes,cpf,' . $this->route('cliente')?->id,
            'data_nascimento' => 'nullable|date_format:Y-m-d|before:today',
            'endereco' => 'nullable|array',
            'endereco.rua' => 'required_with:endereco|min:3|max:50',
            'endereco.numero' => 'required_with:endereco|string|min:1|max:10',
            'endereco.bairro' => 'required_with:endereco|min:3|max:50',
            'endereco.cidade' => 'required_with:endereco|min:3|max:50',
            'endereco.estado' => 'required_with:endereco|min:2|max:2',
            'endereco.cep' => 'sometimes|size:8'
        ];
    }

    protected function prepareForValidation(): void
    {
        if ($this->has('endereco')) {
            $temAlgum = false;
            foreach ($this->get('endereco') as $value) {
                if (isset($value)) {
                    $temAlgum = true;
                    break;
                }
            }

            if (!$temAlgum) {
                $this->merge(['endereco' => null]);
            } else {
                $this->merge([
                    'endereco' => [
                        ...$this->get("endereco"),
                        'estado' => strtoupper($this->get('endereco')['estado']),
                        'cep' => preg_replace('/[^0-9]/', '', $this->get('endereco')['cep']),
                    ],
                ]);
            }
        }

        $this->merge([
            'cpf' => preg_replace('/[^0-9]/', '', $this->get('cpf')),
            'telefone' => preg_replace('/[^0-9]/', '', $this->get('telefone')),
        ]);
    }
}
