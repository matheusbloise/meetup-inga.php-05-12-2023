<?php

declare(strict_types=1);

namespace App\Domain\DTO;

use App\Domain\Enums\Status;
use App\Domain\Enums\Type;
use DateTimeInterface;

final class Movement
{
    public function __construct(
        public readonly int $id,
        public readonly string $uniqueId,
        public readonly string $amount,
        public readonly Type $type,
        public readonly Status $status,
        public readonly DateTimeInterface $createdAt,
    ) {
    }

    public function toArray(): array
    {
        return [
            'unique_id' => $this->uniqueId,
            'amount' => $this->amount,
            'type' => $this->type,
            'status' => $this->status,
        ];
    }
}
