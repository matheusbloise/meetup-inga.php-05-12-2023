<?php

declare(strict_types=1);

namespace App\Domain\Repositories;

use App\Domain\DTO\Movement;
use App\Domain\Entities\MovementEntity;

interface PaymentGatewayRepositoryInterface
{
    public function generate(MovementEntity $entity): Movement;
}
