<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;

    protected $table = 'servicos';
    protected $fillable = [
        'nome',
        'descricao',
        'preco_custo',
        'preco_venda',
    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    public function agendamentos()
    {
        return $this->hasMany(Agendamento::class, 'id_servico');
    }

    public function pacotes()
    {
        return $this->hasMany(Pacote::class, 'id_servico');
    }
}
