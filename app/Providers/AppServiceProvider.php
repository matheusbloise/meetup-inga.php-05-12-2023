<?php

namespace App\Providers;

use App\Domain\ValueObjects\UniqueKey;
use Illuminate\Contracts\Database\Query\Builder as BuilderInterface;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\ServiceProvider;
use Ramsey\Uuid\Uuid;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UniqueKey::class, fn() => Uuid::getFactory());
        $this->app->bind(BuilderInterface::class, fn() => app(Builder::class));
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
