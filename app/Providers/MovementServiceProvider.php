<?php

declare(strict_types=1);

namespace App\Providers;

use App\Domain\Repositories\MovementRepositoryInterface;
use App\Domain\Repositories\PaymentGatewayRepositoryInterface;
use App\Repositories\Factories\PixRepositoryFactory;
use App\Repositories\StoneGatewayRepository;
use Illuminate\Support\ServiceProvider;

class MovementServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->gateway();
        $this->repository();
    }

    private function repository(): void
    {
        $this->app->bind(
            MovementRepositoryInterface::class,
            fn() => app(PixRepositoryFactory::class)()
        );
    }

    private function gateway(): void
    {
        $this->app->bind(
            PaymentGatewayRepositoryInterface::class,
            fn() => new StoneGatewayRepository()
        );
    }
}
