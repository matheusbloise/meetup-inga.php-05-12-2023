<?php

declare(strict_types=1);

namespace App\Domain\Repositories;

use App\Domain\Enums\Type;
use App\DTO\Movement;

interface PaymentGatewayRepositoryInterface
{
    public function generate(string $amount, Type $type): Movement;
}
