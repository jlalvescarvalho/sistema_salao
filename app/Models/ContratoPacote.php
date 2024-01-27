<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContratoPacote extends Model
{
    use HasFactory;

    protected $table = 'contratos_pacotes';
    protected $fillable = [
        'id_cliente',
        'id_pacote',
        'data_contrato',
        'data_vencimento',
        'qtd_sessoes',
        'qtd_sessoes_restantes',
        'status'
    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function pacote()
    {
        return $this->belongsTo(Pacote::class, 'id_pacote');
    }

    public function agendamentos()
    {
        return $this->hasMany(AgendamentoPacote::class, 'id_contrato_pacote', 'id');
    }
}
