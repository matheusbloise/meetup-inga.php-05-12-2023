<?php

namespace Tests\Integration\app\Repositories;

use App\Domain\Enums\Status;
use App\Domain\Enums\Type;
use App\Repositories\Factories\PixRepositoryFactory;
use App\Repositories\PixRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PixRepositoryTest extends TestCase
{
    use RefreshDatabase;

    private PixRepository $repository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->repository = app(PixRepositoryFactory::class)();
    }

    public function testCreate(): void
    {
        $entity = $this->repository->create(100.00);

        $this->assertDatabaseHas('movements', [
            'unique_id' => $entity->uniqueId,
            'amount' => $entity->amount,
            'type' => Type::PIX->value,
            'status' => Status::CREATED->value,
        ]);
    }
}
