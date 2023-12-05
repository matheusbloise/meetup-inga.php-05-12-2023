<?php

namespace Tests\Unit\app\Repositories;

use App\Domain\Entities\MovementEntity;
use App\Domain\Enums\Status;
use App\Domain\Enums\Type;
use App\Domain\Mappers\MovementMapper;
use App\Models\MovementModel;
use App\Repositories\PixRepository;
use DateTime;
use Illuminate\Database\Eloquent\Builder;
use Mockery;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

class PixRepositoryTest extends TestCase
{
    private MovementModel $model;

    private MovementMapper $mapper;

    private PixRepository $repository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->model = Mockery::mock(MovementModel::class);
        $this->mapper = Mockery::mock(MovementMapper::class);
        $this->repository = new PixRepository($this->model, $this->mapper, Uuid::getFactory()->uuid4());
    }

    public function testCreate(): void
    {
        $uuid = Uuid::uuid4()->toString();
        $amount = '100.00';
        $entity = new MovementEntity(
            1,
            $uuid,
            $amount,
            Type::PIX,
            Status::CREATED,
            new DateTime(now()->toString()),
            new DateTime(now()->toString()),
        );

        $builder = Mockery::mock(Builder::class);

        $this->model
            ->shouldReceive('newQuery')
            ->once()
            ->andReturn($builder);

        $builder
            ->shouldReceive('create')
            ->once()
            ->andReturn($builder);

        $builder
            ->shouldReceive('toArray')
            ->once()
            ->andReturn([
                'id' => 1,
                'unique_id' => $uuid,
                'amount' => $amount,
                'type' => Type::PIX->value,
                'status' => Status::CREATED->value,
                'created_at' => now()->toString(),
                'updated_at' => now()->toString(),
            ]);

        $this->mapper
            ->shouldReceive('toEntity')
            ->once()
            ->andReturn($entity);

        $entity = $this->repository->create($amount);

        $this->assertEquals($uuid, $entity->uniqueId);
        $this->assertEquals(1, $entity->type->value);
    }
}
