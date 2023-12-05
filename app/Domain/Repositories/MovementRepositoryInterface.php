<?php

declare(strict_types=1);

namespace App\Domain\Repositories;

use App\Domain\Entities\MovementEntity;
use App\DTO\Movement;

interface MovementRepositoryInterface
{
    public function create(Movement $dto): MovementEntity;
}
