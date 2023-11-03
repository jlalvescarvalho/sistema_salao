<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pacote_contatado extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pacote',
        'id_cliente',
        'id_empresa'
    ];
}