<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgendamentoPacote extends Model
{
    use HasFactory;

    protected $fillable = [
        'data_hora',
        'data_minima_cancelamento',
        'duracao',
        'status',
        'observacao',
        'data_hora_chegada',
        'data_hora_finalizacao',
    ];

    public function contrato()
    {
        return $this->belongsTo(ContratoPacote::class, 'id_contrato_pacote');
    }
}
