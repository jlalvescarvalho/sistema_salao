<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'data_hora',
        'duracao',
        'status',
        'observacao',
        'data_hora_chegada',
        'data_hora_finalizacao'
    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente', 'id');
    }

    public function servico()
    {
        return $this->belongsTo(Servico::class, 'id_servico', 'id');
    }
}
