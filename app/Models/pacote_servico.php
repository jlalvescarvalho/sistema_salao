<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pacote_servico extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_pacote',
        'id_servico'
    ];
}
