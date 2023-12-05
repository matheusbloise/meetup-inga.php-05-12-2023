<?php

namespace Tests\Feature\app\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PixControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testGenerate(): void
    {
        $response = $this->post('/api/pix/qrcode', [
            'amount' => "1000.00"
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                'id',
                'unique_id',
                'amount',
                'type',
                'status',
            ]
        ]);
    }
}
