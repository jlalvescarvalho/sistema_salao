<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class agendamento_servico extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_agendamento',
        'id_servico'
    ];
}
