<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests\Observability;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetNodeCpuProfileRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected int $seconds = 30,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/server/debug/cpu';
    }

    protected function defaultQuery(): array
    {
        return ['seconds' => $this->seconds];
    }
}
