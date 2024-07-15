<?php

namespace App\Enums;

enum ServiceStatusEnum: int
{
    case CANCELED = 0;
    case ON_GOING = 1;
    case FINISHED = 2;
    case IN_REVIEW = 3;
    case INVOICED = 4;

    public function getName(): String
    {
        return match ($this) {
            self::CANCELED => 'Cancelado',
            self::ON_GOING => 'Em andamento',
            self::FINISHED => 'Finalizado',
            self::IN_REVIEW => 'Em analise',
            self::INVOICED => 'Faturado',
            default => 'Status não definido'
        };
    }
}
