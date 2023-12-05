<?php

declare(strict_types=1);

namespace App\Domain\Entities;

use App\Domain\Enums\Status;
use App\Domain\Enums\Type;
use DateTimeInterface;

final class MovementEntity
{
    public function __construct(
        public int $id,
        public string $uniqueId,
        public string $amount,
        public Type $type,
        public Status $status,
        public DateTimeInterface $createdAt,
        public DateTimeInterface|null $updatedAt
    ) {
    }
}
