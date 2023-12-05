<?php

declare(strict_types=1);

namespace App\Services;

use App\Domain\Entities\MovementEntity;
use App\Domain\Enums\Type;
use App\Domain\Repositories\MovementRepositoryInterface;
use App\Domain\Repositories\PaymentGatewayRepositoryInterface;

class PixService
{
    public function __construct(
        private readonly PaymentGatewayRepositoryInterface $gatewayRepository,
        private readonly MovementRepositoryInterface $movementRepository
    ) {
    }

    public function handle(string $amount): MovementEntity
    {
        $pix = $this->gatewayRepository->generate($amount, Type::PIX);
        return $this->movementRepository->create($pix);
    }
}
