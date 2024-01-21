<?php

namespace App\Enums;

enum StatusAgendamento: string
{
    case Pendente = "pendente";
    case Concluido = "concluido";
    case Cancelado = "cancelado";
    case Faltou = "faltou";

    public function cor()
    {
        return match ($this) {
            self::Pendente => "warning",
            self::Concluido => "success",
            self::Cancelado => "secondary",
            self::Faltou => "danger",
        };
    }
}
