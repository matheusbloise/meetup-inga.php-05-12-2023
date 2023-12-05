<?php

namespace Tests\Unit\app\Repositories\Factories;

use App\Repositories\Factories\PixRepositoryFactory;
use App\Repositories\PixRepository;
use Tests\TestCase;

class PixRepositoryFactoryTest extends TestCase
{
    public function testFactory(): void
    {
        $factory = new PixRepositoryFactory();
        $this->assertInstanceOf(PixRepository::class, $factory());
    }
}
