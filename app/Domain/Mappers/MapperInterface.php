<?php

declare(strict_types=1);

namespace App\Domain\Mappers;

interface MapperInterface
{
    public function toEntity(array $data): mixed;
}
