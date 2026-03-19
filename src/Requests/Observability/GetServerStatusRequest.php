<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests\Observability;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Carbon\CarbonImmutable;
use NjoguAmos\Waha\Dto\ServerStatusData;

class GetServerStatusRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/api/server/status';
    }

    public function createDtoFromResponse(Response $response): ServerStatusData
    {
        return new ServerStatusData(
            startTimestamp: CarbonImmutable::createFromTimestampMs($response->json(key: 'startTimestamp')),
            uptime:         $response->json(key: 'uptime'),
        );
    }
}
