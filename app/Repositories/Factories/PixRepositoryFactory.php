<?php

declare(strict_types=1);

namespace App\Repositories\Factories;

use App\Domain\Mappers\MovementMapper;
use App\Models\MovementModel;
use App\Repositories\PixRepository;
use Ramsey\Uuid\UuidFactory;
use Ramsey\Uuid\UuidInterface;

class PixRepositoryFactory
{
    public function __invoke(): PixRepository
    {
        return new PixRepository(
            model: app(MovementModel::class),
            mapper: app(MovementMapper::class),
            uuid: app(UuidInterface::class),
        );
    }
}
