<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'observacao',
        'data_hora',
        'duracao',
        'status',
        'descontar_session',
        'id_cliente',
        'id_empresa'
    ];
}
