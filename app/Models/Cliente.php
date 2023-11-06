<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'telefone',
        'cpf',
        'data_nascimento',
    ];

    public function endereco(): HasOne
    {
        return $this->hasOne(Endereco::class, 'id', 'id_endereco');
    }
}
