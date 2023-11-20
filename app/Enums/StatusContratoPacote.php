<?php

namespace App\Enums;

enum StatusContratoPacote: string
{
    case Ativo = 'ativo';
    case Vencido = 'vencido';
    case Finalizado = 'finalizado';
    case Cancelado = 'cancelado';
}
