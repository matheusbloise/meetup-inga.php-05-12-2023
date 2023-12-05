<?php

declare(strict_types=1);

namespace App\Services;

use App\Domain\DTO\Movement;
use App\Domain\Repositories\MovementRepositoryInterface;
use App\Domain\Repositories\PaymentGatewayRepositoryInterface;

class PixService
{
    public function __construct(
        private readonly PaymentGatewayRepositoryInterface $gatewayRepository,
        private readonly MovementRepositoryInterface $movementRepository
    ) {
    }

    public function handle(string $amount): Movement
    {
        $pix = $this->movementRepository->create($amount);
        return $this->gatewayRepository->generate($pix);
    }
}
