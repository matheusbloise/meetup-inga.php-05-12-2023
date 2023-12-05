<?php

declare(strict_types=1);

namespace App\Domain\Repositories;

use App\Domain\Entities\MovementEntity;
use App\Domain\Enums\Status;
use App\Domain\Mappers\MovementMapper;
use App\DTO\Movement;
use App\Models\MovementModel;

class PixRepository implements MovementRepositoryInterface
{
    public function __construct(
        private readonly MovementModel $model,
        private readonly MovementMapper $mapper,
    ) {
    }

    public function create(Movement $dto): MovementEntity
    {
        $data = [
            'unique_id' => $dto->uniqueId,
            'amount' => $dto->amount,
            'type' => $dto->type->value,
            'status' => Status::CREATED->value
        ];

        $model = $this->model
            ->newQuery()
            ->create($data)
            ->toArray();

        return $this->mapper->toEntity($model);
    }
}
