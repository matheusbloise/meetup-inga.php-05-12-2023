<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Domain\Entities\MovementEntity;
use App\Domain\Enums\Status;
use App\Domain\Enums\Type;
use App\Domain\Mappers\MapperInterface;
use App\Domain\Repositories\MovementRepositoryInterface;
use App\Models\MovementModel;
use Ramsey\Uuid\UuidInterface;

class PixRepository implements MovementRepositoryInterface
{
    public function __construct(
        private readonly MovementModel $model,
        private readonly MapperInterface $mapper,
        private readonly UuidInterface $uuid,
    ) {
    }

    public function create(string $amount): MovementEntity
    {
        $data = [
            'unique_id' => $this->uuid->toString(),
            'amount' => $amount,
            'type' => Type::PIX->value,
            'status' => Status::CREATED->value
        ];

        $model = $this->model
            ->newQuery()
            ->create($data)
            ->toArray();

        return $this->mapper->toEntity($model);
    }
}
