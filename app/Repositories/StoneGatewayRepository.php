<?php

declare(strict_types=1);

namespace App\Domain\Repositories;

use App\Domain\Enums\Type;
use App\DTO\Movement;
use Ramsey\Uuid\Uuid;

class StoneGatewayRepository implements PaymentGatewayRepositoryInterface
{
    public function generate(string $amount, Type $type): Movement
    {
        return new Movement(
            uniqueId: Uuid::uuid4()->toString(),
            amount: $amount,
            type: $type,
        );
    }
}
