<?php

declare(strict_types=1);

namespace App\Domain\Enums;

enum Status: int
{
    case CREATED = 1;
    case CONFIRMED = 2;
    case CANCELED = 3;

    public function getDescription(): string
    {
        return match ($this) {
            self::CREATED => 'Criado',
            self::CONFIRMED => 'Confirmado',
            self::CANCELED => 'Cancelado',
        };
    }
}
