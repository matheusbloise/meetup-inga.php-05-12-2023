<?php

declare(strict_types=1);

namespace App\Domain\Mappers;

use App\Domain\Entities\MovementEntity;
use App\Domain\Enums\Status;
use App\Domain\Enums\Type;
use DateTime;

class MovementMapperInterface implements MapperInterface
{
    public function toEntity(array $data): MovementEntity
    {
        return new MovementEntity(
            id: $data['id'],
            uniqueId: $data['unique_id'],
            amount: $data['amount'],
            type: Type::from($data['type']),
            status: Status::from($data['type']),
            createdAt: new DateTime($data['created_at']),
            updatedAt: new DateTime($data['updated_at']),
        );
    }
}
