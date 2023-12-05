<?php

declare(strict_types=1);

namespace App\Domain\Repositories;

use App\Domain\Entities\MovementEntity;

interface MovementRepositoryInterface
{
    public function create(string $amount): MovementEntity;
}
