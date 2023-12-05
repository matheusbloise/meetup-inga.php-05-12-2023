<?php

namespace Tests\Integration\app\Services;

use App\Domain\Enums\Status;
use App\Domain\Enums\Type;
use App\Domain\Repositories\PaymentGatewayRepositoryInterface;
use App\Services\PixService;
use Exception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;
use Tests\TestCase;

class PixServiceTest extends TestCase
{
    use RefreshDatabase;

    private PixService $pixService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->pixService = $this->app->make(PixService::class);
    }

    public function testHandle(): void
    {
        $entity = $this->pixService->handle('1500.89');

        $this->assertDatabaseHas('movements', [
            'unique_id' => $entity->uniqueId,
            'amount' => $entity->amount,
            'type' => Type::PIX->value,
            'status' => Status::CREATED->value,
        ]);
    }

    public function testHandleExceptionButPersistSuccessfully(): void
    {
        $this->expectException(Exception::class);

        $gatewayRepository = Mockery::mock(PaymentGatewayRepositoryInterface::class);
        $gatewayRepository
            ->shouldReceive('generate')
            ->andThrow(Exception::class);

        $this->pixService = $this->app->make(PixService::class, [
            'gatewayRepository' => $gatewayRepository,
        ]);

        try {
            $this->pixService->handle('3097.10');
        } finally {
            $this->assertDatabaseHas('movements', [
                'amount' => '3097.10',
                'type' => Type::PIX->value,
                'status' => Status::CREATED->value,
            ]);
        }
    }
}
