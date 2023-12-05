<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Domain\DTO\Movement;
use App\Domain\Entities\MovementEntity;
use App\Domain\Enums\Type;
use App\Domain\Repositories\PaymentGatewayRepositoryInterface;

class StoneGatewayRepository implements PaymentGatewayRepositoryInterface
{
    public function generate(MovementEntity $entity): Movement
    {
        return new Movement(
            id: $entity->id,
            uniqueId: $entity->uniqueId,
            amount: $entity->amount,
            type: $entity->type,
            status: $entity->status,
            createdAt: $entity->createdAt
        );
    }
}
