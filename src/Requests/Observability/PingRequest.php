<?php

declare(strict_types=1);

namespace NjoguAmos\Waha\Requests\Observability;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use NjoguAmos\Waha\Dto\PingResponseData;

class PingRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/ping';
    }

    public function createDtoFromResponse(Response $response): PingResponseData
    {
        return new PingResponseData(
            message: $response->json(key: 'message')
        );
    }
}
