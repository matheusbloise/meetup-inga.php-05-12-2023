<?php

declare(strict_types=1);

namespace App\Domain\Enums;

enum Type: int
{
    case PIX = 1;

    public function getDescription(): string
    {
        return match ($this) {
            self::PIX => 'Pix',
        };
    }
}
