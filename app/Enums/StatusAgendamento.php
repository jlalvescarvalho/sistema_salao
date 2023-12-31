<?php

namespace App\Enums;

enum StatusAgendamento: string
{
    case Pendente = "pendente";
    case Concluido = "concluido";
    case Cancelado = "cancelado";
    case Faltou = "faltou";
}
