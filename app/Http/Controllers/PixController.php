<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\PixRequest;
use App\Http\Resources\PixResource;
use App\Services\PixService;

class PixController extends Controller
{
    public function __construct(
        private PixService $service
    ) {
    }

    public function generate(PixRequest $request): PixResource
    {
        $amount = $request->input('amount');
        $pix = $this->service->handle($amount);
        return PixResource::make($pix);
    }
}
