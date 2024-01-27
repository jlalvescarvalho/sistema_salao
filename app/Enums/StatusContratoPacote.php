<?php

namespace App\Enums;

enum StatusContratoPacote: string
{
    case Ativo = 'ativo';
    case Vencido = 'vencido';
    case Finalizado = 'finalizado';
    case Cancelado = 'cancelado';

    public function cor()
    {
        return match ($this) {
            self::Ativo => "warning",
            self::Finalizado => "success",
            self::Cancelado => "secondary",
            self::Vencido => "danger",
        };
    }
}
