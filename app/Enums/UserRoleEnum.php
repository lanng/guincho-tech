<?php

namespace App\Enums;

enum UserRoleEnum: int
{
    case OFFICE = 1;
    case ADMIN = 2;

    public function getName(): String
    {
        return match($this){
            self::OFFICE => 'Escritório',
            self::ADMIN => 'Administrador'
        };
    }
}
