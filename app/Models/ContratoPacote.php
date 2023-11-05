<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContratoPacote extends Model
{
    use HasFactory;

    protected $fillable = [
        'data_contrato',
        'data_vencimento',
        'qtd_sessoes',
        'status'
    ];
}