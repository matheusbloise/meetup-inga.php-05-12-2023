<?php

declare(strict_types=1);

namespace App\DTO;

use App\Domain\Enums\Type;

final class Movement
{
    public function __construct(
        public readonly string $uniqueId,
        public readonly string $amount,
        public readonly Type $type,
    ) {
    }

    public function toArray(): array
    {
        return [
            'unique_id' => $this->uniqueId,
            'amount' => $this->amount,
            'type' => $this->type,
        ];
    }
}
