<?php

namespace App\Enums;

enum InvoiceStatusEnum: int
{
    case FORESEEN = 1;
    case PAID = 2;
    case OVERDUE = 3;
    case CANCELED = 4;

    public function getName(): String
    {
        return match($this){
            self::FORESEEN => 'Previsto',
            self::PAID => 'Pago',
            self::OVERDUE => 'Em atraso',
            self::CANCELED => 'Cancelado',
        };
    }
}
