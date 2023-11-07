<?php

namespace App\Models;

use Carbon\Carbon;
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
        'id_endereco',
    ];

    public function endereco(): HasOne
    {
        return $this->hasOne(Endereco::class, 'id', 'id_endereco');
    }

    public function setNomeAttribute($value)
    {
        $this->attributes['nome'] = strtolower($value);
    }

    public function getNomeAttribute($value)
    {
        return ucwords($value);
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    public function setCpfAttribute($value)
    {
        $this->attributes['cpf'] = preg_replace('/[^0-9]/', '', $value);
    }

    public function getCpfAttribute($value)
    {
        if (strlen($value) != 11) {
            return $value;
        }

        return substr($value, 0, 3) . '.' . substr($value, 3, 3) . '.' . substr($value, 6, 3) . '-' . substr($value, 9, 2);
    }

    public function setTelefoneAttribute($value)
    {
        $this->attributes['telefone'] = preg_replace('/[^0-9]/', '', $value);
    }

    public function getTelefoneAttribute($value)
    {
        if (strlen($value) != 11) {
            return $value;
        }

        return '(' . substr($value, 0, 2) . ') ' . substr($value, 2, 5) . '-' . substr($value, 7, 4);
    }
}
