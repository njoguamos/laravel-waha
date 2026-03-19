<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests\Observability;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetServerEnvVariablesRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected bool $all = false,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/server/environment';
    }

    protected function defaultQuery(): array
    {
        return ['all' => $this->all ? 'true' : 'false'];
    }
}
