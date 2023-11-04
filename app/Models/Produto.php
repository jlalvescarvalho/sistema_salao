<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'codbarras',
        'descricao',
        'un',
        'preco_custo',
        'preco_venda',
        'estoqueinicial',
        'id_empresa'
    ];
}
