<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests\Observability;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use NjoguAmos\Waha\Dto\HealthCheckData;

class GetHealthCheckRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/health';
    }

    public function createDtoFromResponse(Response $response): HealthCheckData
    {
        return HealthCheckData::fromArray($response->json());
    }
}
